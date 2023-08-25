<x-guest-layout :title="__('Forgot Your Password')">
    <div class="mb-10">
        <h1 class="font-bold text-3xl text-white text-center drop-shadow-md">
            {{ __('Forgot Your Password?') }}
        </h1>
    </div>

    <x-form.auth :route="route('password.email')">
        <x-input.auth type="email" id="email" :label="__('Email Address')"/>

        <x-button.auth :label="__('Send Reset Link')"/>
    </x-form.auth>

    <div class="text-center mt-4">
        <a href="{{ route('login') }}" class="text-white font-semibold no-underline hover:underline">
            {{ __('Remember your password? Login') }}
        </a>
    </div>
</x-guest-layout>
