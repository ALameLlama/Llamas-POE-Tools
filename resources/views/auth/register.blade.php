<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="mx-auto w-auto"/>
            </a>
        </x-slot>
        <x-slot name="flavour_text">
            Create your account!
        </x-slot>

        <!-- Validation Errors -->
        <x-validation-errors :errors="$errors"/>

        <x-form method="POST" action="{{ route('register') }}">
            <div class="rounded-md shadow-sm space-y-px">
                <div>
                    <label for="name" class="sr-only">Name</label>
                    <x-input id="name"
                             name="name"
                             type="text"
                             autocomplete="name"
                             value="{{ old('name') }}"
                             required autofocus
                             placeholder="Name"
                             class="rounded-t-md"
                    />
                </div>
                <div>
                    <label for="email" class="sr-only">Email address</label>
                    <x-input id="email"
                             name="email"
                             type="email"
                             autocomplete="email"
                             value="{{ old('email') }}"
                             required
                             placeholder="Email address"
                    />
                </div>
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <x-input id="password"
                             name="password"
                             type="password"
                             autocomplete="new-password"
                             value="{{ old('password') }}"
                             required
                             placeholder="Password"
                    />
                </div>
                <div>
                    <label for="password_confirmation" class="sr-only">Confirm Password</label>
                    <x-input id="password_confirmation"
                             name="password_confirmation"
                             type="password"
                             required
                             placeholder="Confirm Password"
                             class="rounded-b-md"
                    />
                </div>
            </div>

            <div class="flex items-center justify-end">
                <div class="text-sm">
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                            Already registered?
                        </a>
                    @endif
                </div>
            </div>

            <x-button>
                Register
            </x-button>
        </x-form>
    </x-auth-card>
</x-guest-layout>
