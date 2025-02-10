<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rent;
use App\Models\Movie;
use App\Models\User;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rents = Rent::all();
        $movies = Movie::all();
        $users = User::all();
        return view('rents.index', compact('rents', 'movies', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rents = new Rent();
        $rents->movie = $request->movie;
        $rents->user = $request->user;
        $rents->rent_date = $request->rent_date;
        $rents->return_date = $request->return_date;
        $rents->payment_method = $request->payment_method;
        $rents->amount = $request->amount;
        $rents->status = $request->status;
        $rents->save();
        return redirect()->route('rents.index');

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
        $rents = Rent::find($id);
        return view('rents.edit', compact('rents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rents = Rent::find($id);
        $rents->movie = $request->movie;
        $rents->user = $request->user;
        $rents->rent_date = $request->rent_date;
        $rents->return_date = $request->return_date;
        $rents->payment_method = $request->payment_method;
        $rents->amount = $request->amount;
        $rents->status = $request->status;
        $rents->save();
        return redirect()->route('rents.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rents = Rent::find($id);
        $rents->delete();
        return redirect()->route('rents.index');
    }
}
