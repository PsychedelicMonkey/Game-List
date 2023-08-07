@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-semibold underline">Game List</h1>

    @if(count($games) > 0)
        <div>
            @foreach($games as $game)
                <div>
                    <h3>{{ $game->title }}</h3>
                    <a href="{{ route('game-list.show', $game->slug) }}">Read</a>
                </div>
            @endforeach
        </div>
    @else
        <h3>No games found</h3>
    @endif
@endsection
