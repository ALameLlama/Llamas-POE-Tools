<x-app-layout>
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
</x-app-layout>
