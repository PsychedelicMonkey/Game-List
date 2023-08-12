@if(count($games) > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
        @foreach($games as $game)
            <a
                href="{{ route('game-list.show', $game) }}"
                class="group inline-block border-2 no-underline text-black duration-200 hover:border-purple-600 dark:bg-gray-700 dark:text-white"
            >
                        <span class="flex flex-col">
                            @if(array_key_exists('sm', $game->images()->first()->image))
                                <img
                                    src="{{ $game->images()->first()->image['sm']['url'] }}"
                                    alt=""
                                    class="w-full h-48 object-cover"
                                    loading="lazy"
                                />
                            @else
                                <img
                                    src=""
                                    alt="screenshot"
                                    class="w-full h-48 object-cover"
                                    loading="lazy"
                                />
                            @endif

                            <span class="flex-1 px-3 py-4 duration-200 group-hover:bg-purple-600">
                                <h3 class="text-lg font-semibold duration-200 group-hover:text-white">{{ $game->title }}</h3>
                                <h4 class="duration-200 group-hover:text-white">{{ $game->genre->name }}</h4>
                                <h5 class="duration-200 group-hover:text-white">{{ date('Y', strtotime($game->release_date)) }}</h5>
                            </span>
                        </span>
            </a>
        @endforeach
    </div>
@else
    <h3>No games found</h3>
@endif