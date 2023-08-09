@extends('layouts.guest', ['title' => 'Reset Password'])

@section('content')
    <div class="mb-10">
        <h1 class="font-bold text-3xl text-white text-center drop-shadow-md">
            Reset Password
        </h1>
    </div>

    <x-form :route="route('password.update')">
        <input type="hidden" name="token" value="{{ $token }}" />

        <x-input type="email" id="email" label="Email Address" />

        <x-input type="password" id="password" label="Password" />

        <x-input type="password" id="password_confirmation" label="Confirm Password" />

        <x-button label="Reset Password" />
    </x-form>

    <div class="text-center mt-4">
        <a href="{{ route('login') }}" class="text-white font-semibold no-underline hover:underline">
            Remember your password? Login
        </a>
    </div>
@endsection
