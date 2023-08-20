@extends('partials.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto space-y-8">
            <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="max-w-xl">
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

                        <x-input.main id="tags" label="Tags" :value="$game->tags->pluck('name')->implode(', ')" />

                        <x-button.main label="Update Game" />
                    </x-form.main>
                </div>
            </div>

            <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="max-w-xl">
                    <header class="mb-4">
                        <h1 class="text-3xl font-semibold mb-2">Delete Game</h1>
                        <p>Games will be hidden from public view and can be restored at a later time.</p>
                    </header>

                    <x-form.main :action="route('game-list.destroy', $game)">
                        @method('DELETE')

                        <x-button.main label="Delete Game" color="red" />
                    </x-form.main>
                </div>
            </div>
        </div>
    </div>
@endsection
