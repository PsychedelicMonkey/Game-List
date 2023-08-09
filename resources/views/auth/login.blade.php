@extends('layouts.guest', ['title' => 'Login'])

@section('content')
    <div class="mb-10">
        <h1 class="font-bold text-3xl text-white text-center drop-shadow-md">
            Login to Your Account
        </h1>
    </div>

    <x-form :route="route('login')">
        <div class="mb-4">
            <x-input type="email" id="email" label="Email Address" :value="old('email')" />

            <x-input type="password" id="password" label="Password" />

            <div class="flex justify-between items-end">
                <div>
                    <input type="checkbox" name="remember" id="remember" class="focus:ring-0 focus:ring-offset-0" />
                    <label for="remember" class="text-white font-semibold ml-1">Remember Me</label>
                </div>

                <a href="{{ route('password.request') }}" class="text-white font-semibold drop-shadow-lg no-underline hover:underline">
                    Forgot Password?
                </a>
            </div>
        </div>

        <x-button label="Login" />
    </x-form>

    <div class="text-center mt-4">
        <a href="{{ route('register') }}" class="text-white font-semibold no-underline hover:underline">
            Don't have an account? Sign Up
        </a>
    </div>
@endsection
