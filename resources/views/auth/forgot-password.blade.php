<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
               <x-application-logo />
            </a>
         </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form class="card card-md" action="{{ route('password.email') }}" method="post">
            @csrf

            <div class="card-body">
                <!-- Email Address -->
                <h2 class="card-title text-center mb-4">Forgot password</h2>
                <p class="text-muted mb-4">{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>
                <div class="mb-3">
                    <x-label for="email" :value="__('Email')" />
                    <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" placeholder="Enter email" required autofocus />
                </div>

                <div class="form-footer">
                    <x-button class="btn btn-primary w-100">
                        <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="3" y="5" width="18" height="14" rx="2" /><polyline points="3 7 12 13 21 7" /></svg>
                        {{ __('Email Password Reset Link') }}
                    </x-button>
                </div>
            </div>
        </form>
        <div class="text-center text-muted mt-3">
            Forget it, <a href="{{route('login')}}">send me back</a> to the sign in screen.
        </div>
    </x-auth-card>
</x-guest-layout>
