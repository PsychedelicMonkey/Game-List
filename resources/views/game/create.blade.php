<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto space-y-8">
            <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="max-w-xl">
                    <h1 class="text-3xl text-center font-semibold my-4">{{ __('Create Game') }}</h1>

                    <x-form.main :action="route('game-list.store')" enctype="multipart/form-data">
                        <x-input.main id="title" label="{{ __('Title') }}"/>

                        <div class="grid grid-cols-2 gap-4">
                            <x-input.main id="developer" label="{{ __('Developer') }}"/>

                            <x-input.main id="publisher" label="{{ __('Publisher') }}"/>
                        </div>

                        <x-input.main id="genre" label="{{ __('Genre') }}"/>

                        <x-input.main type="date" id="release_date" label="{{ __('Release Date') }}"/>

                        <x-input.textarea id="description" label="{{ __('Description') }}"/>

                        <x-input.main id="gog_url" label="{{ __('GOG URL') }}"/>

                        <x-input.main id="steam_url" label="{{ __('Steam URL') }}"/>

                        <x-input.main type="file" id="image" label="{{ __('Image') }}"/>

                        <x-input.main id="tags" label="{{ __('Tags') }}"/>

                        <x-button.main label="{{ __('Create Game') }}"/>
                    </x-form.main>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
