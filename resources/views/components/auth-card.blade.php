<div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            {{ $logo }}
            <div class="mt-6 text-center text-3xl font-extrabold text-gray-900 dark:text-gray-300">
                {{ $flavour_text }}
            </div>
        </div>
        <div>
            {{ $slot }}
        </div>
    </div>
</div>
