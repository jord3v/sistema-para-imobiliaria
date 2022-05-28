@props(['value'])

<label {{ $attributes->merge(['class' => 'form-label']) }}>
    {{ $value ?? $slot }}
    @if($attributes['page'] == 'login' && (Route::has('password.request')))
        <span class="form-label-description">
            <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
        </span>
    @endif
</label>
