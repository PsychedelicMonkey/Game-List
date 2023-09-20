<div x-data="{ open: false }" class="my-4">
    <div class="mt-4 px-4 py-2 bg-gray-500 dark:bg-gray-700 text-white">
        <button @click="open = !open" class="text-lg" :class="open ? 'text-purple-900 dark:text-purple-400' : 'text-white'">
            <i class="fa-solid fa-filter"></i> {{ __('Filter') }}
        </button>
    </div>

    <div x-cloak x-collapse x-show="open">
        <div class="px-4 py-3 bg-purple-600 dark:bg-purple-800 text-white">
            <div class="flex gap-16">
                {{-- Genres --}}
                @if (cache()->has('genres'))
                    <div>
                        <h3 class="text-2xl font-semibold leading-10">{{ __('Genres') }}</h3>

                        <ul class="list-disc list-inside">
                            @foreach (cache('genres') as $genre)
                                <li>
                                    <a href="{{ route('genre.show', $genre) }}" class="text-white">
                                        {{ $genre->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <h3 class="text-2xl font-semibold leading-10">{{ __('No genres found') }}</h3>
                @endif

                {{-- Tags --}}
                @if (cache()->has('tags'))
                    <div>
                        <h3 class="text-2xl font-semibold leading-10">{{ __('Tags') }}</h3>

                        <ul class="list-disc list-inside">
                            @foreach (cache('tags') as $tag)
                                <li>
                                    <a href="{{ route('tag', $tag->slug) }}" class="text-white">
                                        {{ $tag->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <h3 class="text-2xl font-semibold leading-10">{{ __('No genres found') }}</h3>
                @endif
            </div>
        </div>
    </div>
</div>