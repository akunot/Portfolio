<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Movie;
use App\Models\User;

class ReviewController extends Controller
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
    public function create(String $id)
    {
        $movie = Movie::find($id);
        $users = User::all();
        return view('reviews.create', compact('movie', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reviews = new Review();
        $reviews->movie_id = $request->movie_id;
        $reviews->user_id = $request->user_id;
        $reviews->rating = $request->rating;
        $reviews->comment = $request->comment;
        $reviews->review_date = $request->review_date;
        $reviews->save();
        return redirect()->route('movies.show', $request->movie_id)->with('success', 'Reseña agregada con éxito.');
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
        $reviews = Review::find($id);
        $movie = Movie::find($reviews->movie_id);
        $user = User::find($reviews->user_id);
        return view('reviews.edit', compact('reviews', 'movie', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reviews = Review::find($id);
        $reviews->movie_id = $request->movie_id;
        $reviews->user_id = $request->user_id;
        $reviews->rating = $request->rating;
        $reviews->comment = $request->comment;
        $reviews->review_date = $request->review_date;
        $reviews->save();
        return redirect()->route('movies.show', $request->movie_id)->with('success', 'Reseña agregada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reviews = Review::find($id);
        $movie_id = $reviews->movie_id;
        $reviews->delete();
        return redirect()->route('movies.show', $movie_id)->with('success', 'Reseña eliminada con éxito.');
    }
}
