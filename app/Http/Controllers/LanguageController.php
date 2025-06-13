<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Services\TranslationService;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class LanguageController extends Controller
{
	protected $translationService;

    public function __construct(TranslationService $translationService)
    {
        $this->translationService = $translationService;
    }
     public function index()
    {
		$locales = $this->translationService->getAvailableLocales();
		return view('language.view-language',compact('locales'));
    }
	 public function create()
    {
		$locales = $this->translationService->getAvailableLocales();
		return view('language.add-language',compact('locales'));
    }
	public function delete($locale)
	{
		$path = resource_path("lang/{$locale}.json");

		if (File::exists($path)) {
			File::delete($path);
			return back()->with('success', __('Language file deleted successfully.'));
		} else {
			return redirect()->back()->with('error', __('Language file not found.'));
		}
	}
	public function upload(Request $request)
	{
		try {
			// Validate the uploaded file
			$request->validate([
				'lang_file' => 'required|file|mimes:json|max:2048',
			]);

			$file = $request->file('lang_file');
			$lang = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

			// Validate language code (e.g., en, fr)
			if (!preg_match('/^[a-zA-Z]{2,8}$/', $lang)) {
				return back()->withErrors(['lang_file' => 'Invalid language code. Use format like en.json or fr.json.']);
			}

			// Validate JSON content
			$content = json_decode(file_get_contents($file->getPathname()), true);
			if (json_last_error() !== JSON_ERROR_NONE) {
				return back()->withErrors(['lang_file' => 'The uploaded file is not a valid JSON.']);
			}

			// Ensure JSON is an array
			if (!is_array($content)) {
				return back()->withErrors(['lang_file' => 'The JSON file must contain a valid translation array.']);
			}

			// Define destination file path (directly in resources/lang)
			$destinationFile = resource_path("lang/{$lang}.json");

			// Check if file already exists
			if (File::exists($destinationFile)) {
				return back()->withErrors(['lang_file' => 'A language file for this language already exists.']);
			}

			// Ensure resources/lang directory exists
			$langPath = resource_path('lang');
			if (!File::exists($langPath)) {
				if (!File::makeDirectory($langPath, 0755, true)) {
					\Log::error("Failed to create directory: {$langPath}");
					return back()->withErrors(['lang_file' => 'Failed to create lang directory. Check server permissions.']);
				}
			}

			// Save the file
			if (!File::put($destinationFile, json_encode($content, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))) {
				\Log::error("Failed to write file: {$destinationFile}");
				return back()->withErrors(['lang_file' => 'Failed to save language file. Check server permissions.']);
			}

			\Log::info("Language file uploaded: {$lang}.json");
			return redirect()->route('language.listing')->with('success', 'Language file uploaded successfully.');
		} catch (\Exception $e) {
			\Log::error("Language upload failed: {$e->getMessage()}");
			return back()->withErrors(['lang_file' => 'An error occurred: ' . $e->getMessage()]);
		}
	}
}
