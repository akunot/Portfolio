<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Director;
use App\Models\Actor;
use App\Models\Genre;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $actors = Actor::all();
        $directors = Director::all();
        $genres = Genre::all();
        return view('movies.create', compact('actors', 'directors', 'genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets_movies'), $imageName);
        } else {
            $imageName = null;
        }

        $movies = new Movie();
        $movies->name = $request->name;
        $movies->description = $request->description;
        $movies->year_release = $request->year_release;
        $movies->price = $request->price;
        $movies->image = $imageName;

        // Guardar relaciones en movie_actors
        if ($request->has('actors')) {
            $movies->save();
            $movies->actors()->sync($request->actors);
        }

        // Guardar relaciones en movie_directors
        if ($request->has('directors')) {
            $movies->save();
            $movies->directors()->sync($request->directors);
        }

        // Guardar relaciones en movie_genres
        if ($request->has('genres')) {
            $movies->save();
            $movies->genres()->sync($request->genres);
        }

        $movies->save();
        return redirect()->route('movies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->load(['directors', 'actors']);
        $averageRating = $movie->reviews()->avg('rating');

        return view('Movies.show', compact('movie', 'averageRating'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movies = Movie::find($id);
        $actors = Actor::all();
        $directors = Director::all();
        $genres = Genre::all();
        return view('movies.edit', compact('movies', 'actors', 'directors', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $movies = Movie::find($id);
        $movies->name = $request->name;
        $movies->description = $request->description;
        $movies->year_release = $request->year_release;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets_director'), $imageName);
        } else {
            $imageName = $movies->image;
        }


        $movies->price = $request->price;
        $movies->image = $imageName;

        // Guardar relaciones en movie_actors
        if ($request->has('actors')) {
            $movies->save();
            $movies->actors()->sync($request->actors);
        }

        // Guardar relaciones en movie_directors
        if ($request->has('directors')) {
            $movies->save();
            $movies->directors()->sync($request->directors);
        }

        // Guardar relaciones en movie_genres
        if ($request->has('genres')) {
            $movies->save();
            $movies->genres()->sync($request->genres);
        }

        $movies->save();
        return redirect()->route('movies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movies = Movie::find($id);
        $movies->actors()->detach();
        $movies->delete();
        return redirect()->route('movies.index'); 
    }

    public function reviews($id)
{
    $movie = Movie::with('reviews.user')->findOrFail($id);
    return view('movies.reviews', compact('movie'));
}
}
