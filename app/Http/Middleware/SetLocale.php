<?php

namespace App\Http\Middleware;

use App\Services\TranslationService;
use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    protected $translationService;

    public function __construct(TranslationService $translationService)
    {
        $this->translationService = $translationService;
    }

    public function handle(Request $request, Closure $next)
    {
        $locale = $request->session()->get('locale', config('app.locale'));
        $this->translationService->setLocale($locale);

        return $next($request);
    }
}