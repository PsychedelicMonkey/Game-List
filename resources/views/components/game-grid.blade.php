@if(count($games) > 0)
    {{ $games->appends($_GET)->links() }}

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-6">
        @foreach($games as $game)
            <a
                href="{{ route('game-list.show', $game) }}"
                class="group inline-block no-underline bg-white text-black drop-shadow-lg duration-200 rounded-lg dark:bg-gray-700 dark:text-white hover:bg-purple-600 dark:hover:bg-purple-600"
            >
                <span class="flex flex-col">
                    <img
                        src="{{ $game->media->first()->getUrl('small') }}"
                        alt="screenshot"
                        class="w-full h-52 lg:h-44 object-cover rounded-t-lg"
                        loading="lazy"
                    />

                    <span class="flex-1 px-4 py-4 duration-200 rounded-b-lg">
                        <h3 class="text-lg font-semibold duration-200 group-hover:text-white">{{ $game->title }}</h3>
                        <h4 class="duration-200 group-hover:text-white">{{ $game->genre->name }}</h4>
                        <h5 class="duration-200 group-hover:text-white">{{ date('Y', strtotime($game->release_date)) }}</h5>
                    </span>
                </span>
            </a>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $games->appends($_GET)->links() }}
    </div>
@else
    <h3>{{ __('No games found') }}</h3>
@endif
