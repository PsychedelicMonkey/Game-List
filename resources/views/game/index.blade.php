@extends('partials.app')

@section('content')
    <div class="my-3">
        <h1 class="text-3xl font-semibold underline">{{ __('Game List') }}</h1>
    </div>

    <div class="flex justify-between items-end">
        <x-year-form :route="route('game-list.index')"/>
    </div>

    <x-genre-badges/>

    <x-game-grid :games="$games"/>
@endsection
