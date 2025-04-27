<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Actor;

class ApiActorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actors = Actor::all();
        return response()->json($actors);
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
        $actors = new Actor();
        $actors->name = $request->name;
        $actors->date_birth = $request->date_birth;
        $actors->nationality = $request->nationality;
        $actors->biography = $request->biography;
        $actors->save();
        return response()->json($actors);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $actor = Actor::findOrFail($id);
        return response()->json($actor);
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
        $actors = Actor::find($id);
        $actors->name = $request->name;
        $actors->date_birth = $request->date_birth;
        $actors->nationality = $request->nationality;
        $actors->biography = $request->biography;
        $actors->save();
        return response()->json($actors);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $actors = Actor::find($id);
        $actors->delete();
        return response()->json("El actor ha sido borrado");
    }
}
