<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Genre_Movie;
use App\Models\Genre;
use App\Models\Movie;

class Genre_MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genre_movies = Genre_Movie::all();
        $genres = Genre::all();
        $movies = Movie::all();
        return view('genre_movies.index', compact('genre_movies', 'genres', 'movies'));
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
        $contar = count($request->genre_id);
        for ($i = 0; $i < $contar; $i++) {
            $genre_movies = new Genre_Movie();
            $genre_movies->genre = $request->genre;
            $genre_movies->movie = $request->movie;
            $genre_movies->save();
        }
        return redirect()->route('genre_movies.index');
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
