<?php

namespace App\Http\Controllers;

use App\Services\TranslationService;
use Illuminate\Http\Request;

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