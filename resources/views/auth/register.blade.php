<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
               <x-application-logo />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form class="card card-md" action="{{ route('register') }}" method="post">
            @csrf
            <div class="card-body">
            <h2 class="card-title text-center mb-4">Create new account</h2>
            <!-- Name -->
            <div class="mb-3">
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" placeholder="Enter name" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mb-3">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" placeholder="Enter email" required />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <x-label for="password" :value="__('Password')" />
                <div class="input-group input-group-flat">
                    <x-input type="password"  class="form-control" placeholder="Password" name="password" required autocomplete="current-password" />
                    <span class="input-group-text">
                        <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                        </a>
                    </span>
                </div>
             </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <x-label for="password" :value="__('Confirm Password')" />
                <div class="input-group input-group-flat">
                    <x-input type="password"  class="form-control" placeholder="{{__('Confirm Password')}}" name="password_confirmation" required autocomplete="current-password" />
                    <span class="input-group-text">
                        <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                        </a>
                    </span>
                </div>
            </div>

            <div class="form-footer">
                <x-button class="btn btn-primary w-100">
                    {{ __('Register') }}
                </x-button>
            </div>
            </div>
        </form>
        <div class="text-center text-muted mt-3">
            <a href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>
    </x-auth-card>
</x-guest-layout>
