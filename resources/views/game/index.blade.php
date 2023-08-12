@extends('layouts.app')

@section('content')
    <div class="my-3">
        <h1 class="text-3xl font-semibold underline">Game List</h1>
    </div>

    <div>
        @include ('partials.year-form', ['route' => route('game-list.index')])
    </div>

    @include ('partials.genre-badges')

    @include ('partials.game-grid', $games)
@endsection
