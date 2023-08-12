<form action="{{ $route }}">
    <div class="flex gap-2 items-end">
        <div class="flex flex-col">
            <label for="from">From</label>
            <input type="number" name="from" id="from" min="1980" max="{{ date('Y') }}" value="{{ request('from') ?? '1980' }}" class="rounded-lg bg-transparent" />
        </div>

        <div class="flex flex-col">
            <label for="to">To</label>
            <input type="number" name="to" id="to" min="1980" max="{{ date('Y') }}" value="{{ request('to') ?? date('Y') }}" class="rounded-lg bg-transparent" />
        </div>

        <button type="submit" class="flex bg-purple-600 text-white px-4 py-2.5 rounded-lg hover:bg-purple-800">
            Search
        </button>
    </div>
</form>
