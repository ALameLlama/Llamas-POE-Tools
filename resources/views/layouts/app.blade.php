<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      :class="darkMode ? 'dark' : ''"
      x-data="{ darkMode: localStorage.getItem('darkTheme') === 'true'} "
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

        <link
                href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css"
                rel="stylesheet"
        />

        @livewireStyles
    </head>
    <body class="h-full antialiased bg-zinc-50 dark:bg-zinc-800 transition-colors duration-300">
        <div x-data="{ sidebarOpen: false }" class="min-h-full">
            <div
                x-show="sidebarOpen"
                class="fixed inset-0 flex z-40 md:hidden"
                role="dialog"
                :aria-modal="sidebarOpen"
            >
            <div
                x-show="sidebarOpen"
                x-transition:enter="transition-opacity ease-linear duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity ease-linear duration-300"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 bg-zinc-600 bg-opacity-75"
                :aria-hidden="!sidebarOpen"
            ></div>
                <div
                    x-show="sidebarOpen"
                    x-transition:enter="transition ease-in-out duration-300 transform"
                    x-transition:enter-start="-translate-x-full"
                    x-transition:enter-end="translate-x-0"
                    x-transition:leave="transition ease-in-out duration-300 transform"
                    x-transition:leave-start="translate-x-0"
                    x-transition:leave-end="-translate-x-full"
                    class="relative flex-1 flex flex-col max-w-xs w-full bg-zinc-800 dark:bg-zinc-900"
                >
                    <div
                        x-show="sidebarOpen"
                        x-transition:enter="ease-in-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="ease-in-out duration-300"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="absolute top-0 right-0 -mr-12 pt-2"
                    >
                        <button type="button" @click="sidebarOpen = false" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                            <span class="sr-only">Close sidebar</span>
                            <!-- Heroicon name: outline/x -->
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
                        <div class="flex-shrink-0 flex items-center px-4">
                            <x-application-logo-light class="w-full" />
                        </div>
                        <nav class="mt-5 px-2 space-y-1">
                            <!-- Current: "bg-zinc-900 text-white", Default: "text-gray-300 hover:bg-zinc-700 hover:text-white" -->
                            <a href="{{ route('dashboard') }}" class="{{ Route::is('dashboard') ? 'bg-zinc-900 text-white dark:bg-zinc-700' : 'text-gray-300 hover:bg-zinc-700 dark:hover:bg-zinc-500 hover:text-white' }} group flex items-center px-2 py-2 text-base font-medium rounded-md">
                                <!-- Heroicon name: outline/home -->
                                <!-- Current: "text-gray-300", Default: "text-gray-400 group-hover:text-gray-300" -->
                                <svg class="{{ Route::is('dashboard') ? 'text-gray-300' : 'text-gray-400 group-hover:text-gray-300' }} mr-4 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                Dashboard
                            </a>

                            <a href="{{ route('archnemesis-recipe-tracker') }}" class="{{ Route::is('archnemesis-recipe-tracker') ? 'bg-zinc-900 text-white dark:bg-zinc-700' : 'text-gray-300 hover:bg-zinc-700 dark:hover:bg-zinc-500 hover:text-white' }} group flex items-center px-2 py-2 text-base font-medium rounded-md">
                                <!-- Heroicon name: outline/users -->
                                <svg class="{{ Route::is('archnemesis-recipe-tracker') ? 'text-gray-300' : 'text-gray-400 group-hover:text-gray-300' }} mr-4 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                                Archnemesis Recipe Tracker
                            </a>
                        </nav>
                    </div>
                    @if (Route::has('login'))
                    <x-form mt="0" method="POST" action="{{ route('logout') }}">
                        <x-button class="rounded-none">
                            Log Out
                        </x-button>
                    </x-form>
                    @endif
                </div>

                <div class="flex-shrink-0 w-14">
                    <!-- Force sidebar to shrink to fit close icon -->
                </div>
            </div>

            <!-- Static sidebar for desktop -->
            <div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0">
                <div class="flex-1 flex flex-col min-h-0 bg-zinc-800 dark:bg-zinc-900">
                    <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                        <div class="flex items-center flex-shrink-0 px-4">
                            <x-application-logo-light class="w-full"/>
                        </div>
                        <nav class="mt-5 flex-1 px-2 space-y-1">
                            <!-- Current: "bg-zinc-900 text-white", Default: "text-gray-300 hover:bg-zinc-700 hover:text-white" -->
                            <a href="{{ route('dashboard') }}" class="{{ Route::is('dashboard') ? 'bg-zinc-900 text-white dark:bg-zinc-700' : 'text-gray-300 hover:bg-zinc-700 dark:hover:bg-zinc-500 hover:text-white' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                <!-- Heroicon name: outline/home -->
                                <!-- Current: "text-gray-300", Default: "text-gray-400 group-hover:text-gray-300" -->
                                <svg class="{{ Route::is('dashboard') ? 'text-gray-300' : 'text-gray-400 group-hover:text-gray-300' }} mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                Dashboard
                            </a>

                            <a href="{{ route('archnemesis-recipe-tracker') }}" class="{{ Route::is('archnemesis-recipe-tracker') ? 'bg-zinc-900 text-white dark:bg-zinc-700' : 'text-gray-300 hover:bg-zinc-700 dark:hover:bg-zinc-500 hover:text-white' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                <!-- Heroicon name: outline/users -->
                                <svg class="{{ Route::is('archnemesis-recipe-tracker') ? 'text-gray-300' : 'text-gray-400 group-hover:text-gray-300' }} mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                                Archnemesis Recipe Tracker
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="md:pl-64 flex flex-col flex-1 h-screen">
                <div class="absolute top-0 right-0 z-10 p-4">
                    <button type="button" @click="darkMode = !darkMode" class="z-10">
                        <!-- Heroicon name: outline/sun -->
                        <svg class="h-6 w-6 stroke-zinc-400" fill="none"
                             x-show="darkMode"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>

                        <!-- Heroicon name: outline/moon -->
                        <svg class="h-6 w-6 stroke-zinc-800" fill="none"
                            x-show="!darkMode"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </button>
                </div>
                <div class="sticky top-0 md:hidden pl-1 pt-1 sm:pl-3 sm:pt-3 bg-zinc-100 dark:bg-zinc-600">
                    <button type="button" @click="sidebarOpen = true" class="-ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 dark:text-gray-300 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                        <span class="sr-only">Open sidebar</span>
                        <!-- Heroicon name: outline/menu -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
                <main class="flex-1">
                    {{ $slot }}
                </main>
            </div>
        </div>

        @livewireScripts
    </body>
</html>
