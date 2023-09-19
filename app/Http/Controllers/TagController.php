<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Tags\Tag;

class TagController extends Controller
{
    public function __invoke(string $slug): View
    {
        $perPage = 20;

        $games = Game::withAnyTags($slug)->paginate($perPage);
        $tag = Tag::findFromString($slug);

        return view('game.index', [
            'games' => $games,
            'title' => $tag->name,
        ]);
    }
}
