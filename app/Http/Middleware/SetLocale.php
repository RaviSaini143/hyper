<?php

namespace App\Http\Middleware;

use App\Services\TranslationService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetLocale
{
    protected $translationService;

    public function __construct(TranslationService $translationService)
    {
        $this->translationService = $translationService;
    }

    public function handle(Request $request, Closure $next)
    {
		if (Auth::check() && Auth::user()->language) {
            // Set locale from user database preference
            $locale = Auth::user()->language;
        } else {
            // Fallback to session or app default
            $locale = $request->session()->get('locale', config('app.locale'));
        }
        //$locale = $request->session()->get('locale', config('app.locale'));
        $this->translationService->setLocale($locale);

        return $next($request);
    }
}