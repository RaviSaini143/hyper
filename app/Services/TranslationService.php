<?php

namespace App\Services;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class TranslationService
{
    public function translate(string $key, array $replace = [], ?string $locale = null): string
    {
        return trans($key, $replace, $locale ?: App::getLocale());
    }

    public function setLocale(string $locale): void
    {
        if (in_array($locale, $this->getAvailableLocales())) {
            App::setLocale($locale);
            session()->put('locale', $locale);
        }
    }

    public function getAvailableLocales(): array
    {
        $localeFiles = File::files(resource_path('lang'));
        $locales = [];

        foreach ($localeFiles as $file) {
            if ($file->getExtension() === 'json') {
                $locales[] = $file->getFilenameWithoutExtension();
            }
        }

        return $locales;
    }
}