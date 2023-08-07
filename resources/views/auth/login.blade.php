@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-semibold underline">Log In</h1>

    <form action="{{ url('login') }}" method="post">
        @csrf

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

        <button type="submit">Log In</button>
    </form>
@endsection
