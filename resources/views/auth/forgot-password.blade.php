@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-semibold underline">Forgot your password?</h1>

    @if(session()->has('status'))
        <p>{{ session('status') }}</p>
    @endif

    <form action="{{ route('password.email') }}" method="post">
        @csrf

        <div>
            <label for="email">Email Address</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" />

            @error('email')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Send Email</button>
    </form>
@endsection
