@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-semibold underline">Create Game</h1>

    <form action="{{ route('game-list.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" class="bg-transparent" />

            @error('title')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="developer">Developer</label>
            <input type="text" name="developer" id="developer" value="{{ old('developer') }}" class="bg-transparent" />

            @error('developer')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre" value="{{ old('genre') }}" class="bg-transparent" />

            @error('genre')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="release_date">Release Date</label>
            <input type="date" name="release_date" id="release_date" value="{{ old('release_date') }}" class="bg-transparent" />

            @error('release_date')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description">Genre</label>
            <textarea name="description" id="description" cols="30" rows="10" class="bg-transparent">{{ old('description') }}</textarea>

            @error('description')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="urls">GOG URL</label>
            <input type="text" name="gog_url" id="gog_url" value="{{ old('gog_url') }}" class="bg-transparent" />

            @error('gog_url')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="urls">Steam URL</label>
            <input type="text" name="steam_url" id="steam_url" value="{{ old('steam_url') }}" class="bg-transparent" />

            @error('steam_url')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="image">Image</label>
            <input type="file" name="image" id="image" />

            @error('image')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Submit</button>
    </form>
@endsection
