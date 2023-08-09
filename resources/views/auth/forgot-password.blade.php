@extends('layouts.guest', ['title' => 'Forgot Your Password'])

@section('content')
    <div class="mb-10">
        <h1 class="font-bold text-3xl text-white text-center drop-shadow-md">
            Forgot Your Password?
        </h1>
    </div>

    <x-form :route="route('password.email')">
        <x-input type="email" id="email" label="Email Address" />

        <x-button label="Send Reset Link" />
    </x-form>

    <div class="text-center mt-4">
        <a href="{{ route('login') }}" class="text-white font-semibold no-underline hover:underline">
            Remember your password? Login
        </a>
    </div>
@endsection
