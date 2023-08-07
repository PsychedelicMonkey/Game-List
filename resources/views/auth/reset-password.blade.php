@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-semibold underline">Reset your password</h1>

    @if(session()->has('status'))
        <p>{{ session('status') }}</p>
    @endif

    <form action="{{ route('password.update') }}" method="post">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}" />

        <div>
            <label for="email">Email Address</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" />

            @error('email')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" />

            @error('password')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" />

            @error('password_confirmation')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Send Email</button>
    </form>
@endsection
