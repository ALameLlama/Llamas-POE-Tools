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
            Just let us know your email address, and we will email you a password reset link that will allow you to choose a new one.
        </div>

        <!-- Session Status -->
        <x-session-status :status="session('status')" />

        <!-- Validation Errors -->
        <x-validation-errors :errors="$errors" />

        <x-form method="POST" action="{{ route('password.email') }}">
            <div class="rounded-md shadow-sm space-y-px">
                <label for="email" class="sr-only">Email address</label>
                <x-input id="email"
                         name="email"
                         type="email"
                         autocomplete="email"
                         value="{{ old('email') }}"
                         required autofocus
                         placeholder="Email address"
                         class="rounded-md"
                />
            </div>

            <x-button>
                Email Password Reset Link
            </x-button>
        </x-form>
    </x-auth-card>
</x-guest-layout>
