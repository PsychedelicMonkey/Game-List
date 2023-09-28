<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Game;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Models\Genre;
use App\Models\Publisher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class GameController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Game::class, 'game');
        $this->middleware('verified')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $page = $request->query('page', 1);
        $perPage = 20;

        if ($request->has('from') && $request->has('to')) {
            $from = $request->query('from', '1980');
            $to = $request->query('to', date('Y'));

            $from = date($from . '-01-01');
            $to = date($to . '-12-31');

            $games = Game::query()
                ->with(['genre', 'media'])
                ->whereBetween('release_date', [$from, $to])
                ->orderBy('release_date', 'desc')
                ->paginate($perPage);
        } else {
            $data = Cache::rememberForever('game-list', function () {
                return Game::query()
                    ->with(['genre', 'media'])
                    ->orderBy('release_date', 'desc')
                    ->get();
            });

            $games = new LengthAwarePaginator(
                $data->forPage($page, $perPage),
                $data->count(),
                $perPage,
                $page,
                [
                    'path' => $request->url(),
                ]
            );
        }

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

        // Format tags
        $tags = $this->formatTags($request->tags);

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
        $game->addMedia($file)->toMediaCollection();

        return redirect()->route('game-list.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game): View
    {
        $game->load(['developer', 'genre', 'media', 'publisher']);

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

        $tags = $this->formatTags($request->tags);

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

    private function formatTags(string $tags): array
    {
        $arr = explode(',', $tags);
        $arr = array_map('trim', $arr);
        return array_map('ucfirst', $arr);
    }
}
