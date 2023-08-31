<div class="grow">
    <form action="{{ route('search') }}">
        <div class="h-8 flex rounded-full">
            <input
                type="text"
                name="search"
                id="search"
                placeholder="{{ __('Search') }}"
                class="px-4 w-full rounded-l-full border-0 bg-purple-700 dark:bg-purple-900 placeholder-gray-300"
            />

            <button type="submit" class="px-6 rounded-r-full bg-purple-500 dark:bg-purple-600">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
    </form>
</div>
