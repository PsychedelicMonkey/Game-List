@extends('partials.app')

@section('content')
    <div class="my-3">
        <h1 class="text-3xl font-semibold underline">{{ $genre->name }}</h1>
    </div>

    <div>
        <x-year-form :route="route('genre.show', $genre)"/>
    </div>

    <x-genre-badges/>

    <x-game-grid :games="$genre->games"/>
@endsection
