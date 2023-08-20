@extends('partials.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto space-y-8">
            <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="max-w-xl">
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

                        <x-input.main id="tags" label="Tags" />

                        <x-button.main label="Create Game" />
                    </x-form.main>
                </div>
            </div>
        </div>
    </div>
@endsection
