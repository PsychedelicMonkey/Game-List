@extends('partials.guest', ['title' => 'Reset Password'])

@section('content')
    <div class="mb-10">
        <h1 class="font-bold text-3xl text-white text-center drop-shadow-md">
            Reset Password
        </h1>
    </div>

    <x-form.auth :route="route('password.store')">
        <input type="hidden" name="token" value="{{ $token }}"/>

        <x-input.auth type="email" id="email" label="Email Address"/>

        <x-input.auth type="password" id="password" label="Password"/>

        <x-input.auth type="password" id="password_confirmation" label="Confirm Password"/>

        <x-button.auth label="Reset Password"/>
    </x-form.auth>

    <div class="text-center mt-4">
        <a href="{{ route('login') }}" class="text-white font-semibold no-underline hover:underline">
            Remember your password? Login
        </a>
    </div>
@endsection
