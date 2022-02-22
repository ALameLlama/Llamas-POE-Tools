<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="mx-auto w-auto"/>
            </a>
        </x-slot>
        <x-slot name="flavour_text">
            Thanks for signing up!
        </x-slot>

        <div class="text-sm text-gray-600 text-center">
            Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
        </div>

        @if (session('status') == 'verification-link-sent')
            <x-session-status :status="'A new verification link has been sent to the email address you provided during registration.'"/>
        @endif

        <div class="flex flex-col">
            <x-form mt="0" method="POST" action="{{ route('verification.send') }}">
                <x-button>
                    Resend Verification Email
                </x-button>
            </x-form>
            <x-form mt="0" method="POST" action="{{ route('logout') }}">
                <x-button>
                    Log Out
                </x-button>
            </x-form>
        </div>
    </x-auth-card>
</x-guest-layout>
