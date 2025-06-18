<?php

namespace App\Http\Controllers;

use App\Services\TranslationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // ✅ This line is required

class TranslationController extends Controller
{
    protected $translationService;

    public function __construct(TranslationService $translationService)
    {
        $this->translationService = $translationService;
    }

    public function index()
    {
        $locales = $this->translationService->getAvailableLocales();
        return view('test-translation', compact('locales'));
    }

    public function changeLocale(Request $request)
    {
        $locale = $request->input('locale');
		$user = Auth::user();
        $user->language = $request->input('locale');
        $user->save();
        $this->translationService->setLocale($locale);

        return redirect()->back();
    }
	public function changeLocale2(Request $request)
    {
        $locale = $request->input('locale');
		$user = Auth::user();
        $user->language = $request->input('locale');
        $user->save();
        $this->translationService->setLocale($locale);

        return redirect()->back();
    }
	/**
     * Display the admin dashboard.
     */
    public function dashboard()
    {
        $locales = $this->translationService->getAvailableLocales();
        return view('index', compact('locales'));
    }
}