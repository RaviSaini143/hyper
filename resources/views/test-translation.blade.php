<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Translation Test') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold mb-4">{{ __('Translation Test') }}</h1>
        <p class="text-lg mb-4">{{ __('Welcome to our application') }}</p>
        <p class="text-lg mb-4">{{ __('greeting', ['name' => 'User']) }}</p>

        <form action="{{ route('change.locale') }}" method="POST" class="flex items-center" id="language-form">
            @csrf
            <label for="locale" class="mr-2">{{ __('Language') }}:</label>
            <select name="locale" id="locale" class="border rounded p-2" onchange="document.getElementById('language-form').submit();">
                @foreach ($locales as $locale)
                    <option value="{{ $locale }}" {{ app()->getLocale() === $locale ? 'selected' : '' }}>
                        {{ strtoupper($locale) }}
                    </option>
                @endforeach
            </select>
        </form>
    </div>
</body>
</html>