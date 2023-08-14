@extends('partials.guest', ['title' => 'Register'])

@section('content')
    <div class="mb-10">
        <h1 class="font-bold text-3xl text-white text-center drop-shadow-md">
            Register Your Account
        </h1>
    </div>

    <x-form.auth :route="route('register')">
        <x-input.auth id="name" label="Name"/>

        <x-input.auth type="email" id="email" label="Email Address"/>

        <x-input.auth type="password" id="password" label="Password"/>

        <x-input.auth type="password" id="password_confirmation" label="Confirm Password"/>

        <x-button.auth label="Register"/>
    </x-form.auth>

    <div class="text-center mt-4">
        <a href="{{ route('login') }}" class="text-white font-semibold no-underline hover:underline">
            Already have an account? Login
        </a>
    </div>
@endsection
