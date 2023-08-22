<x-guest-layout :title="__('Register')">
    <div class="mb-10">
        <h1 class="font-bold text-3xl text-white text-center drop-shadow-md">
            {{ __('Register Your Account') }}
        </h1>
    </div>

    <x-form.auth :route="route('register')">
        <x-input.auth id="name" label="{{ __('Name') }}"/>

        <x-input.auth type="email" id="email" label="{{ __('Email Address') }}"/>

        <x-input.auth type="password" id="password" label="{{ __('Password') }}"/>

        <x-input.auth type="password" id="password_confirmation" label="{{ __('Confirm Password') }}"/>

        <x-button.auth label="{{ __('Register') }}"/>
    </x-form.auth>

    <div class="text-center mt-4">
        <a href="{{ route('login') }}" class="text-white font-semibold no-underline hover:underline">
            {{ __('Already have an account? Login') }}
        </a>
    </div>
</x-guest-layout>
