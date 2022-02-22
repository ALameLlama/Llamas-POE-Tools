<x-guest-layout>
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block align-bottom">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 dark:text-gray-300 underline">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 dark:text-gray-300 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 dark:text-gray-300 underline">Register</a>
                @endif
            @endauth
        @endif
            <button type="button" @click="darkMode = !darkMode" class="z-10 ml-6">
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
    <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <a href="/">
                <x-application-logo class="mx-auto w-auto"/>
            </a>
            <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-300 sm:text-right sm:ml-0">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
        </div>
    </div>
</x-guest-layout>
