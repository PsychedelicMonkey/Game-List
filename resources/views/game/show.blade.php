@extends('layouts.app')

@section('content')
    @auth
        <div class="mt-3">
            @can('update', $game)
                <div class="flex justify-center gap-2 mb-3">
                    <a href="{{ route('game-list.edit', $game) }}"
                       class="inline-block w-14 border-2 hover:bg-transparent text-white text-center no-underline transition-colors duration-200 rounded-md px-2 py-1
                                border-blue-600 bg-blue-600 hover:text-blue-600"
                    >
                        Edit
                    </a>
                </div>
            @endcan
        </div>
    @endauth

    <div class="flex justify-between items-start my-3">
        <div class="w-full md:w-2/3 m-auto">
            @if(array_key_exists('lg', $game->images()->first()->image))
                <img
                    src="{{ $game->images()->first()->image['lg']['url'] }}"
                    alt=""
                    class="w-full m-auto"
                />
            @else
                <img
                    src=""
                    alt="screenshot"
                    class="w-full m-auto"
                />
            @endif

            <div class="my-4 pb-2 border-b-2 border-purple-300">
                <h1 class="text-3xl font-bold mb-2 lg:text-4xl">{{ $game->title }}</h1>
                <h3 class="text-xl font-semibold text-purple-900">{{ $game->developer->name }}</h3>
            </div>

            <div>
                <h4 class="text-lg">Genre: <strong>{{ $game->genre->name }}</strong></h4>
                <h4 class="text-lg">
                    Release Date: <strong>{{ date('F j, Y', strtotime($game->release_date)) }}</strong>
                </h4>
            </div>
        </div>
    </div>
@endsection
