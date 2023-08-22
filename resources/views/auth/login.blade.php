<x-guest-layout :title="__('Login')">
    <div class="mb-10">
        <h1 class="font-bold text-3xl text-white text-center drop-shadow-md">
            {{ __('Login to Your Account') }}
        </h1>
    </div>

    <x-form.auth :route="route('login')">
        <div class="mb-4">
            <x-input.auth type="email" id="email" label="{{ __('Email Address') }}" :value="old('email')"/>

            <x-input.auth type="password" id="password" label="{{ __('Password') }}"/>

            <div class="flex justify-between items-end">
                <div>
                    <input type="checkbox" name="remember" id="remember" class="focus:ring-0 focus:ring-offset-0"/>
                    <label for="remember" class="text-white font-semibold ml-1">{{ __('Remember Me') }}</label>
                </div>

                <a href="{{ route('password.request') }}"
                   class="text-white font-semibold drop-shadow-lg no-underline hover:underline">
                    {{ __('Forgot Password?') }}
                </a>
            </div>
        </div>

        <x-button.auth label="{{ __('Login') }}"/>
    </x-form.auth>

    <div class="text-center mt-4">
        <a href="{{ route('register') }}" class="text-white font-semibold no-underline hover:underline">
            {{ __('Don\'t have an account? Sign Up') }}
        </a>
    </div>
</x-guest-layout>
