<x-guest-layout>
    <div class="min-h-full pt-16 pb-12 flex flex-col bg-white">

        <main class="flex-grow flex flex-col justify-center max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8">
            <div class="min-h-full flex items-center justify-center py-4 px-4 sm:px-6 lg:px-8">
                <div class="justify-center max-w-md w-full space-y-8">
                    <a href="/">
                        <x-application-logo class="mx-auto w-auto"/>
                    </a>
                </div>
            </div>
            <div class="py-1">
                <div class="text-center">
                    <p class="text-sm font-semibold text-indigo-600 uppercase tracking-wide">404 error</p>
                    <h1 class="mt-2 text-4xl font-extrabold text-gray-900 dark:text-gray-300 tracking-tight sm:text-5xl">Page not found.</h1>
                    <p class="mt-2 text-base text-gray-500 dark:text-gray-300">Sorry, we couldn’t find the page you’re looking for.</p>
                    <div class="mt-6">
                        <a href="#" class="text-base font-medium text-indigo-600 hover:text-indigo-500">Go back home<span aria-hidden="true"> &rarr;</span></a>
                    </div>
                </div>
            </div>
        </main>
        <footer class="flex-shrink-0 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex justify-center space-x-4">
{{--                <a href="#" class="text-sm font-medium text-gray-500 dark:text-gray-300 hover:text-gray-600">Contact Support</a>--}}
{{--                <span class="inline-block border-l border-gray-300" aria-hidden="true"></span>--}}
                <a href="{{ env('TWITTER_LINK', '#') }}" class="text-sm font-medium text-gray-500 dark:text-gray-300 hover:text-gray-600">Twitter</a>
            </nav>
        </footer>
    </div>
</x-guest-layout>
