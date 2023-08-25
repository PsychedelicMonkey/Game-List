<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function __invoke(Request $request): View
    {
        $perPage = 20;

        $games = Game::search($request->search)->paginate($perPage);

        return view('search', compact('games'));
    }
}
