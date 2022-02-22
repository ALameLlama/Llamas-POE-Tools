<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      :class="darkMode ? 'dark' : ''"
      x-data="{ darkMode: localStorage.getItem('darkTheme') === 'true'}"
      x-init="$watch('darkMode', val => localStorage.setItem('darkTheme', val))"
{{--  TODO: update to also check system pref--}}
>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="h-full antialiased bg-zinc-50 dark:bg-zinc-800 transition-colors duration-300">
        {{ $slot }}
    </body>
</html>
