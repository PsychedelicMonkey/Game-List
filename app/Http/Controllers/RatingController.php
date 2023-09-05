<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Http\Requests\StoreRatingRequest;
use App\Http\Requests\UpdateRatingRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RatingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Rating::class, 'rating');
        $this->middleware('verified')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $ratings = Rating::all();

        return view('rating.index', compact('ratings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('rating.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRatingRequest $request): RedirectResponse
    {
        $request->validated();

        Rating::query()->create([
            'type' => $request->type,
            'score' => $request->score,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return Redirect::route('rating.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rating $rating): View
    {
        return view('rating.edit', compact('rating'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRatingRequest $request, Rating $rating): RedirectResponse
    {
        $rating->fill($request->validated());
        $rating->save();

        return Redirect::route('rating.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rating $rating): RedirectResponse
    {
        $rating->delete();

        return Redirect::route('rating.index');
    }
}
