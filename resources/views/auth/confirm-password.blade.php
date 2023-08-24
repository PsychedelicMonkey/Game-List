<x-guest-layout :title="__('Confirm Password')">
    <div class="mb-10">
        <h1 class="font-bold text-3xl text-white drop-shadow-md">
            {{ __('This is a secure area of the application.') }}
        </h1>

        <h3 class="mt-5 font-semibold text-xl text-white drop-shadow-md">
            {{ __('Please confirm your password before continuing.') }}
        </h3>
    </div>

    <x-form.auth :route="route('password.confirm')">
        <div class="mb-4">
            <x-input.auth type="password" id="password" label="{{ __('Password') }}"/>
        </div>

        <x-button.auth label="{{ __('Confirm') }}"/>
    </x-form.auth>
</x-guest-layout>
