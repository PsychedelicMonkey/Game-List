<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\TagHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Http\Resources\GameResource;
use App\Models\Developer;
use App\Models\Game;
use App\Models\Genre;
use App\Models\Publisher;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class GameController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Game::class, 'game');
        $this->middleware(['admin', 'verified'])->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        $games = Game::query()
            ->with(['developer', 'genre', 'media', 'publisher', 'tags'])
            ->latest()
            ->paginate(20);

        return GameResource::collection($games);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGameRequest $request): GameResource
    {
        $request->validated();

        $tags = TagHelper::formatTags($request->tags);

        // Create or find Developer
        $developer = Developer::query()->firstOrCreate([
            'name' => $request->developer,
        ]);

        // Create or find Genre
        $genre = Genre::query()->firstOrCreate([
            'name' => $request->genre,
        ]);

        // Create or find Publisher
        $publisher = Publisher::query()->firstOrCreate([
            'name' => $request->publisher,
        ]);

        // Create the Game
        $game = Game::query()->create([
            'title' => $request->title,
            'release_date' => $request->release_date,
            'description' => $request->description,
            'developer_id' => $developer->id,
            'genre_id' => $genre->id,
            'publisher_id' => $publisher->id,
            'urls' => array(
                'gog' => $request->gog_url,
                'steam' => $request->steam_url,
            ),
        ]);

        // Attach tags
        $game->attachTags($tags);

        // Associate file
        $game->addMedia($request->file('image'))->toMediaCollection();

        $game->load(['developer', 'genre', 'media', 'publisher', 'tags']);
        return new GameResource($game);
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game): GameResource
    {
        $game->load(['developer', 'genre', 'media', 'publisher', 'tags']);

        return new GameResource($game);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGameRequest $request, Game $game): GameResource
    {
        $request->validated();

        $tags = TagHelper::formatTags($request->tags);

        $developer = Developer::query()->firstOrCreate([
            'name' => $request->developer,
        ]);

        $genre = Genre::query()->firstOrCreate([
            'name' => $request->genre,
        ]);

        $publisher = Publisher::query()->firstOrCreate([
            'name' => $request->publisher,
        ]);

        $game->update([
            'title' => $request->title,
            'release_date' => $request->release_date,
            'description' => $request->description,
            'developer_id' => $developer->id,
            'genre_id' => $genre->id,
            'publisher_id' => $publisher->id,
            'urls' => array(
                'gog' => $request->gog_url,
                'steam' => $request->steam_url,
            ),
        ]);

        // Sync tags
        $game->syncTags($tags);

        $game->load(['developer', 'genre', 'media', 'publisher', 'tags']);
        return new GameResource($game);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game): Response
    {
        $game->delete();

        return response()->noContent();
    }
}
