@extends('layouts.app')

@section('content')
    <div class="my-3">
        <h1 class="text-3xl font-semibold underline">{{ $genre->name }}</h1>
    </div>

    <div>
        @include ('partials.year-form', ['route' => route('genre.show', $genre)])
    </div>

    @include ('partials.genre-badges')

    @include ('partials.game-grid', ['games' => $genre->games])
@endsection
