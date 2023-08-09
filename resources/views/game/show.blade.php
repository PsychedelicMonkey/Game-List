@extends('layouts.app')

@section('content')
    <img src="{{ $game->images()->first()->image['url'] }}" alt="" />
    <h1 class="text-3xl font-semibold underline">{{ $game->title }}</h1>
    <h3>{{ $game->developer->name }}</h3>
    <h3>{{ $game->genre->name }}</h3>

    @can('update', $game)
        <a href="{{ route('game-list.edit', $game) }}">Edit this game</a>
    @endcan
@endsection
