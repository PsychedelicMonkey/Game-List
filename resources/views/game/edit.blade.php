@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-semibold underline">Update Game</h1>

    <form action="{{ route('game-list.update', $game) }}" method="post">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $game->title }}" />

            @error('title')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="developer">Developer</label>
            <input type="text" name="developer" id="developer" value="{{ $game->developer->name }}" />

            @error('developer')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre" value="{{ $game->genre->name }}" />

            @error('genre')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="release_date">Release Date</label>
            <input type="date" name="release_date" id="release_date" value="{{ date('Y-m-d', strtotime($game->release_date)) }}" />

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

        <button type="submit">Submit</button>
    </form>

    <form action="{{ route('game-list.destroy', $game) }}" method="post">
        @csrf
        @method('DELETE')

        <button type="submit">Delete</button>
    </form>
@endsection
