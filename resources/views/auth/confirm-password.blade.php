<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
               <x-application-logo />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form class="card card-md" action="{{ route('password.confirm') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="mb-4">
                    <h2 class="card-title">Account Locked</h2>
                    <p class="text-muted">{{ __('This is a secure area of the application. Please confirm your password before continuing.') }}</p>
                </div>
            <!-- Password -->
                <div class="mb-3">
                    <x-label for="password" :value="__('Password')" />
                    <x-input class="form-control" type="password" name="password" required autocomplete="current-password" placeholder="Password" />
                </div>

                <div class="form-footer">
                    <x-button class="btn btn-primary w-100">
                        {{ __('Confirm') }}
                    </x-button>
                </div>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
