@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-semibold underline">Verify your email</h1>

    @if(session()->has('status'))
        <p>{{ session('status') }}</p>
    @endif

    <form action="{{ route('verification.send') }}" method="post">
        @csrf

        <button type="submit">Send verification link</button>
    </form>
@endsection