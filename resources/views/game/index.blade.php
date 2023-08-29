<x-app-layout>
    <div class="my-3">
        <h1 class="text-3xl font-semibold underline">{{ $title ?? __('Game List') }}</h1>
    </div>

    <div class="flex justify-between items-end">
        <x-year-form :route="route('game-list.index')"/>
    </div>

    <x-genre-badges/>

    <x-game-grid :games="$games"/>
</x-app-layout>
