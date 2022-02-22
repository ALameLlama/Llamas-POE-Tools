<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="mx-auto w-auto"/>
            </a>
        </x-slot>
        <x-slot name="flavour_text">
            Log into your account!
        </x-slot>

        <!-- Session Status -->
        <x-session-status :status="session('status')"/>

        <!-- Validation Errors -->
        <x-validation-errors :errors="$errors"/>

        <x-form method="POST" action="{{ route('login') }}">
            <div class="rounded-md shadow-sm space-y-px">
                <div>
                    <label for="email" class="sr-only">Email address</label>
                    <x-input id="email"
                             name="email"
                             type="email"
                             autocomplete="email"
                             value="{{ old('email') }}"
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

            <div class="flex flex-col-reverse md:flex-row md:justify-between">
                <div class="flex flex-row-reverse md:flex-row items-center">
                    <input type="hidden" name="remember" value="false">
                    <input id="remember_me" name="remember" type="checkbox"
                           class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="remember_me" class="mr-2 md:ml-2 block text-sm text-gray-900 dark:text-gray-300">
                        Remember me
                    </label>
                </div>

                <div class="text-sm">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="font-medium text-indigo-600 hover:text-indigo-500 ">
                            Forgot your password?
                        </a>
                    @endif
                </div>
            </div>

            <x-button :lock="true">
                Sign in
            </x-button>
        </x-form>
    </x-auth-card>
</x-guest-layout>
