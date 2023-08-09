<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Game;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Models\GameImage;
use App\Models\Genre;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;

class GameController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Game::class, 'game');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $games = Game::all();

        return view('game.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('game.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGameRequest $request): RedirectResponse
    {
        $request->validated();

        $file = $request->file('image');
        $size = getimagesize($file);

        if (!Storage::directoryExists('public/photo')) {
            Storage::disk('public')->makeDirectory('photo');
        }

        $image = Storage::disk('public')->put('photo', $file);

        $developer = Developer::query()->firstOrCreate([
            'name' => $request->developer,
        ]);

        $genre = Genre::query()->firstOrCreate([
            'name' => $request->genre,
        ]);

        $game = Game::query()->create([
            'title' => $request->title,
            'release_date' => $request->release_date,
            'description' => $request->description,
            'developer_id' => $developer->id,
            'genre_id' => $genre->id,
        ]);

        GameImage::query()->create([
            'image' => array(
                'url' => URL::to(Storage::url($image)),
                'width' => $size[0],
                'height' => $size[1],
            ),
            'original_name' => $file->getClientOriginalName(),
            'mime_type' => $file->getClientMimeType(),
            'file_hash' => hash_file('sha1', $file),
            'size' => $file->getSize(),
            'game_id' => $game->id,
        ]);

        return redirect()->route('game-list.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game): View
    {
        return view('game.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game): View
    {
        return view('game.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGameRequest $request, Game $game): RedirectResponse
    {
        $request->validated();

        $developer = Developer::query()->firstOrCreate([
            'name' => $request->developer,
        ]);

        $genre = Genre::query()->firstOrCreate([
            'name' => $request->genre,
        ]);

        $game->update([
            'title' => $request->title,
            'release_date' => $request->release_date,
            'description' => $request->description,
            'developer_id' => $developer->id,
            'genre_id' => $genre->id,
        ]);

        return redirect()->route('game-list.show', $game->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game): RedirectResponse
    {
        $game->delete();

        return redirect()->intended('game-list');
    }
}
