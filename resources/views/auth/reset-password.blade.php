<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="mx-auto w-auto"/>
            </a>
        </x-slot>
        <x-slot name="flavour_text">
            Reset password!
        </x-slot>

        <!-- Validation Errors -->
        <x-validation-errors :errors="$errors" />

        <x-form method="POST" action="{{ route('password.update') }}">
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div class="rounded-md shadow-sm space-y-px">
                <div>
                    <label for="email" class="sr-only">Email address</label>
                    <x-input id="email"
                             name="email"
                             type="email"
                             autocomplete="email"
                             value="{{ old('email', $request->email) }}"
                             required autofocus
                             placeholder="Email address"
                             class="rounded-t-md"
                    />
                </div>
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <x-input id="password"
                             name="password"
                             type="password"
                             autocomplete="current-password"
                             value="{{ old('password') }}"
                             required
                             placeholder="Password"
                             class="rounded-b-md"
                    />
                </div>
            </div>

            <div>
                <x-button>
                    Reset Password
                </x-button>
            </div>
        </x-form>
    </x-auth-card>
</x-guest-layout>
