<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

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
        return view('movies.create');
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
        $movies->status = $request->status;
        $movies->image = $imageName;
        $movies->save();
        return redirect()->route('movies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = Movie::findOrFail($id);

        $averageRating = $movie->reviews()->avg('rating');

        return view('Movies.show', compact('movie', 'averageRating'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movies = Movie::find($id);
        return view('movies.edit', compact('movies'));
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
        $movies->status = $request->status;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets_director'), $imageName);
        } else {
            $imageName = $movies->image;
        }

        $movies->image = $imageName;
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
