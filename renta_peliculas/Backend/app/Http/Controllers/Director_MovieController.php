<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Director_Movie;
use App\Models\Director;
use App\Models\Movie;

class Director_MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $director_movies = Director_Movie::all();
        $directors = Director::all();
        $movies = Movie::all();
        return view('director_movies.index', compact('director_movies', 'directors', 'movies'));
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
        $cuantos = count($request->director_id);
        for ($i = 0; $i < $cuantos; $i++) {
            $director_movies = new Director_Movie();
            $director_movies->director = $request->director;
            $director_movies->movie = $request->movie;
            $director_movies->save();
        }
        return redirect()->route('director_movies.index');
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
