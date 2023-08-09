@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-semibold underline">Create Game</h1>

    <form action="{{ route('game-list.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" />

            @error('title')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="developer">Developer</label>
            <input type="text" name="developer" id="developer" value="{{ old('developer') }}" />

            @error('developer')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre" value="{{ old('genre') }}" />

            @error('genre')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="release_date">Release Date</label>
            <input type="date" name="release_date" id="release_date" value="{{ old('release_date') }}" />

            @error('release_date')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description">Genre</label>
            <textarea name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>

            @error('description')
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
