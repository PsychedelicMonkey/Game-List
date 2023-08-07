@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-semibold underline">Register</h1>

    <form action="{{ url('register') }}" method="post">
        @csrf

        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" />

            @error('name')
            <p>{{ $message }}</p>
            @enderror
        </div>

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

        <button type="submit">Register</button>
    </form>
@endsection
