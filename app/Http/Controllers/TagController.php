<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TagController extends Controller
{
    public function __invoke(Request $request): View
    {
        $query = $request->query('query', '');
        $perPage = 20;

        $games = Game::withAnyTags($query)->paginate($perPage);

        return view('game.index', [
            'games' => $games,
            'title' => ucfirst($query)
        ]);
    }
}
