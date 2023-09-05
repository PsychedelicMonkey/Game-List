<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto space-y-8">
            <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="max-w-xl">
                    <h1 class="text-3xl text-center font-semibold my-4">{{ __('Edit Rating') }}</h1>

                    <x-form.main :action="route('rating.update', $rating)">
                        @method('PUT')

                        <div class="flex flex-col mb-2">
                            <label for="type" class="text-lg mb-1">{{ __('Type') }}</label>

                            <select name="type" id="type" class="bg-white dark:bg-gray-800 rounded-lg">
                                <option value="admin">{{ __('Admin') }}</option>
                                <option value="user">{{ __('User') }}</option>
                            </select>

                            @error('type')
                            <p class="font-semibold text-lg text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <x-input.main type="number" id="score" :label="__('Score')" :value="$rating->score" />

                        <x-input.main id="title" :label="__('Title')" :value="$rating->title" />

                        <x-input.textarea id="description" :label="__('Description')" :value="$rating->description" />

                        <x-button.main :label="__('Update Game')"/>
                    </x-form.main>
                </div>
            </div>

            <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="max-w-xl">
                    <header class="mb-4">
                        <h1 class="text-3xl font-semibold mb-2">{{ __('Delete Rating') }}</h1>
                    </header>

                    <x-form.main :action="route('rating.destroy', $rating)">
                        @method('DELETE')

                        <x-button.main :label="__('Delete Game')" color="red"/>
                    </x-form.main>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
