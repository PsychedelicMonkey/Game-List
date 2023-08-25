<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGenreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre, Request $request): View
    {
        $perPage = 20;

        if ($request->has('from') && $request->has('to')) {
            $from = $request->query('from', '1980');
            $to = $request->query('to', date('Y'));

            $from = date($from . '-01-01');
            $to = date($to . '-12-31');

            $genre->setRelation(
                'games',
                $genre->games()->whereBetween('release_date', [$from, $to])->paginate($perPage)
            );
        } else {
            $genre->setRelation(
                'games',
                $genre->games()->paginate($perPage)
            );
        }

        return view('genre.show', compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGenreRequest $request, Genre $genre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        //
    }
}
