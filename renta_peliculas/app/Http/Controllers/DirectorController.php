<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Director;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directors = Director::all();
        return view('directors.index', compact('directors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('directors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $directors = new Director();
        $directors->name = $request->name;
        $directors->date_birth = $request->date_birth;
        $directors->nationality = $request->nationality;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets_director'), $imageName);
        } else {
            $imageName = null;
        
        }

        $directors->biography = $request->biography;
        $directors->image = $imageName;
        $directors->save();
        return redirect()->route('directors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $directors = Director::find($id);
        return view('directors.show', compact('directors'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $directors = Director::find($id);
        return view('directors.edit', compact('directors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $directors = Director::find($id);
        $directors->name = $request->name;
        $directors->date_birth = $request->date_birth;
        $directors->nationality = $request->nationality;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets_director'), $imageName);
        } else {
            $imageName = $directors->image;
        }

        $directors->biography = $request->biography;
        $directors->image = $imageName;
        $directors->save();
        return redirect()->route('directors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $directors = Director::find($id);
        $directors->delete();
        return redirect()->route('directors.index');
    }
}
