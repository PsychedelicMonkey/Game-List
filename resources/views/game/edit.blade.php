@extends('partials.app')

@section('content')
    <h1 class="text-3xl font-semibold underline">Update Game</h1>

    <form action="{{ route('game-list.update', $game) }}" method="post">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $game->title }}" class="bg-transparent"/>

            @error('title')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="developer">Developer</label>
            <input type="text" name="developer" id="developer" value="{{ $game->developer->name }}"
                   class="bg-transparent"/>

            @error('developer')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre" value="{{ $game->genre->name }}" class="bg-transparent"/>

            @error('genre')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="release_date">Release Date</label>
            <input type="date" name="release_date" id="release_date"
                   value="{{ date('Y-m-d', strtotime($game->release_date)) }}" class="bg-transparent"/>

            @error('release_date')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10"
                      class="bg-transparent">{{ $game->description }}</textarea>

            @error('description')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="urls">GOG URL</label>
            <input type="text" name="gog_url" id="gog_url" value="{{ $game->urls['gog'] ?? null }}"
                   class="bg-transparent"/>

            @error('gog_url')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="urls">Steam URL</label>
            <input type="text" name="steam_url" id="steam_url" value="{{ $game->urls['steam'] ?? null }}"
                   class="bg-transparent"/>

            @error('steam_url')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Submit</button>
    </form>

    <form action="{{ route('game-list.destroy', $game) }}" method="post">
        @csrf
        @method('DELETE')

        <button type="submit">Delete</button>
    </form>
@endsection
