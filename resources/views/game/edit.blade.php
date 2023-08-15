@extends('partials.app')

@section('content')
    <h1 class="text-3xl text-center font-semibold my-4">Edit Game - {{ $game->title }}</h1>

    <x-form.main :action="route('game-list.update', $game)">
        @method('PUT')

        <x-input.main id="title" label="Title" :value="$game->title" />

        <div class="grid grid-cols-2 gap-4">
            <x-input.main id="developer" label="Developer" :value="$game->developer->name" />

            <x-input.main id="publisher" label="Publisher" :value="$game->publisher->name" />
        </div>

        <x-input.main id="genre" label="Genre" :value="$game->genre->name" />

        <x-input.main type="date" id="release_date" label="Release Date" :value="date('Y-m-d', strtotime($game->release_date))" />

        <x-input.textarea id="description" label="Description" :value="$game->description" />

        <x-input.main id="gog_url" label="GOG URL" :value="$game->urls['gog'] ?? null" />

        <x-input.main id="steam_url" label="Steam URL" :value="$game->urls['steam'] ?? null" />

        <x-button.main label="Update Game" />
    </x-form.main>


    <div class="mt-8 border-t-2 border-t-neutral-500 pt-8">
        <x-form.main :action="route('game-list.destroy', $game)">
            @method('DELETE')

            <x-button.main label="Delete Game" color="red" />
        </x-form.main>
    </div>
@endsection
