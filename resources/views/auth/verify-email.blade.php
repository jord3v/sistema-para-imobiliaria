<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
               <x-application-logo />
            </a>
        </x-slot>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <form class="card card-md" action="{{ route('verification.send') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="mb-4">
                    <p class="text-muted">{{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}</p>
                </div>
                <div class="form-footer">
                    <x-button class="btn btn-primary w-100">
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </div>
            </div>
        </form>
        <div class="text-center text-muted mt-3">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a :href="route('logout')" class="text-primary" onclick="event.preventDefault(); this.closest('form').submit();"> {{ __('Log Out') }} </a>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
