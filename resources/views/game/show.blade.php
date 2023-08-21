@extends('partials.app', ['title' => $game->title])

@section('content')
    @auth
        <div class="mt-3">
            @can('update', $game)
                <div class="flex justify-center gap-2 mb-3">
                    <a href="{{ route('game-list.edit', $game) }}"
                       class="inline-block w-14 border-2 hover:bg-transparent text-white text-center no-underline transition-colors duration-200 rounded-md px-2 py-1
                                border-blue-600 bg-blue-600 hover:text-blue-600"
                    >
                        {{ __('Edit') }}
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
                <h3 class="text-xl font-semibold">
                    {{ __('Developer:') }}
                    <span class="text-purple-900 dark:text-purple-500">{{ $game->developer->name }}</span>
                </h3>
                <h3 class="text-xl font-semibold">
                    {{ __('Publisher:') }}
                    <span class="text-purple-900 dark:text-purple-500">{{ $game->publisher->name }}</span>
                </h3>
            </div>

            <div>
                <h4 class="text-lg">
                    {{ __('Genre:') }}
                    <strong>{{ $game->genre->name }}</strong>
                </h4>

                <h4 class="text-lg">
                    {{ __('Release Date:') }}
                    <strong>{{ date('F j, Y', strtotime($game->release_date)) }}</strong>
                </h4>

                <h4 class="text-lg">
                    {{ __('Tags:') }}
                    <strong>{{ $game->tags->pluck('name')->implode(', ') }}</strong>
                </h4>

                {{-- TODO: Style store links --}}

                @if(isset($game->urls['gog']))
                    <a href="{{ $game->urls['gog'] }}" target="_blank">GOG</a>
                @endif

                @if(isset($game->urls['steam']))
                    <a href="{{ $game->urls['steam'] }}" target="_blank">Steam</a>
                @endif
            </div>
        </div>
    </div>
@endsection
