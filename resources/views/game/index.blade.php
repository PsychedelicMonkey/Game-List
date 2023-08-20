@extends('partials.app')

@section('content')
    <div class="my-3">
        <h1 class="text-3xl font-semibold underline">Game List</h1>
    </div>

    <div class="flex justify-between items-end">
        <x-year-form :route="route('game-list.index')"/>

        <div>
            <form action="{{ route('search') }}">
                <div class="flex rounded-lg">
                    <input type="text" name="search" id="search" placeholder="Search" class="bg-transparent border-r-0 rounded-l-lg" />
                    <button type="submit" class="bg-purple-600 text-white rounded-r-lg px-4 hover:bg-purple-800">
                        Search
                    </button>
                </div>
            </form>
        </div>
    </div>

    <x-genre-badges/>

    <x-game-grid :games="$games"/>
@endsection
