<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actor;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actors = Actor::all();
        return view('actors.index', compact('actors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('actors.create');
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

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets_actor'), $imageName);
        } else {
            $imageName = null;
        
        }
        $actors->biography = $request->biography;
        $actors->image = $imageName;
        $actors->save();
        return redirect()->route('actors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $actors = Actor::find($id);
        return view('actors.show', compact('actors'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $actors = Actor::find($id);
        return view('actors.edit', compact('actors'));
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

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets_actor'), $imageName);
        } else {
            $imageName = $actors->image;
        
        }

        $actors->biography = $request->biography;
        $actors->image = $imageName;
        $actors->save();
        return redirect()->route('actors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $actors = Actor::find($id);
        $actors->movies()->detach(); 
        $actors->delete();
        return redirect()->route('actors.index');
    }
}
