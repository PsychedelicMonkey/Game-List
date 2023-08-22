@extends('layouts.app')

@section('content')
    <div class="my-3">
        <h1 class="text-3xl font-semibold underline">{{ __('Search Results') }}</h1>
    </div>

    <x-game-grid :games="$games"/>
@endsection
