@if(cache()->has('genres'))
    <div class="flex gap-2 my-4">
        @foreach(cache('genres') as $genre)
            <a
                href="{{ route('genre.show', $genre) }}"
                class="bg-gray-500 hover:bg-gray-300 hover:text-gray-500 dark:bg-gray-600 dark:hover:bg-gray-300
                            text-white no-underline px-4 py-2 rounded-lg duration-200"
            >
                {{ $genre->name }}
            </a>
        @endforeach
    </div>
@endif
