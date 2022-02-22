<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="mx-auto w-auto"/>
            </a>
        </x-slot>
        <x-slot name="flavour_text">
            Reset Password!
        </x-slot>

        <div class="mb-4 text-sm text-gray-600 text-center">
            This is a secure area of the application. Please confirm your password before continuing.
        </div>

        <!-- Validation Errors -->
        <x-validation-errors :errors="$errors"/>

        <x-form method="POST" action="{{ route('password.confirm') }}">
            <div class="rounded-md shadow-sm space-y-px">
                <label for="password" class="sr-only">Password</label>
                <x-input id="password"
                         name="password"
                         type="password"
                         autocomplete="current-password"
                         value="{{ old('password') }}"
                         required autofocus
                         placeholder="Password"
                         class="rounded-md"
                />
            </div>

            <x-button>
                Confirm
            </x-button>
        </x-form>
    </x-auth-card>
</x-guest-layout>
