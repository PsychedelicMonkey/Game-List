@extends('partials.app')

@section('content')
    <h1 class="text-3xl text-center font-semibold my-4">Create Game</h1>

    <x-form.main :action="route('game-list.store')" enctype="multipart/form-data">
        <x-input.main id="title" label="Title" />

        <div class="grid grid-cols-2 gap-4">
            <x-input.main id="developer" label="Developer" />

            <x-input.main id="publisher" label="Publisher" />
        </div>

        <x-input.main id="genre" label="Genre" />

        <x-input.main type="date" id="release_date" label="Release Date" />

        <x-input.textarea id="description" label="Description" />

        <x-input.main id="gog_url" label="GOG URL" />

        <x-input.main id="steam_url" label="Steam URL" />

        <x-input.main type="file" id="image" label="Image" />

        <x-button.main label="Create Game" />
    </x-form.main>
@endsection
