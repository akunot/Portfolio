<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Actor_Movie;
use App\Models\Actor;
use App\Models\Movie;

class Actor_MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actor_movies = Actor_Movie::all();
        $actors = Actor::all();
        $movies = Movie::all();
        return view('actor_movies.index', compact('actor_movies', 'actors', 'movies'));
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
    public function store(Request $request)
    {
        $cuantos = count($request->actor_id);
        for ($i = 0; $i < $cuantos; $i++) {
            $actor_movies = new Actor_Movie();
            $actor_movies->actor = $request->actor;
            $actor_movies->movie = $request->movie;
            $actor_movies->save();
        }
        return redirect()->route('actor_movies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
