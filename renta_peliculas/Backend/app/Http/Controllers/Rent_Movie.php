<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Rent_Movies;
use App\Models\Movie;
use App\Models\Rent;

class Rent_Movie extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rent_movies = Rent_Movies::all();
        $movies = Movie::all();
        $rent = Rent::all();
        /*return view(, compact('rent_movies', 'movies', 'rent')); */ 
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
        //
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
