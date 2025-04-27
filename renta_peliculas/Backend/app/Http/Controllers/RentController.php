<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rent;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{
    // Mostrar el carrito
    public function index()
    {
        $user = Auth::user()->load('rents');
        $pendingReturn = Rent::where('user_id', Auth::id())->where('status', 'rentada')->exists();
        $cart = Rent::where('user_id', Auth::id())
                     ->where('status', 'carrito')
                     ->first();

        return view('rents.index', compact('cart', 'user', 'pendingReturn'));
    }

    // Añadir película al carrito
    public function store(Request $request)
    {
        $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'quantity' => 'required|integer|min:1'
        ]);

        // Verificar si el usuario tiene rentas pendientes
        $pendingRents = Rent::where('user_id', Auth::id())->where('status', 'rentada')->exists();

        if ($pendingRents) {
            return redirect()->back()->with('error', 'Debes devolver las películas rentadas antes de crear un nuevo carrito.');
        }

        // Verificar si el usuario tiene un carrito activo
        $cart = Rent::where('user_id', Auth::id())
                     ->where('status', 'carrito')
                     ->first();

        if (!$cart) {
            // Crear un nuevo carrito si no existe uno activo
            $cart = Rent::create([
            'user_id' => Auth::id(),
            'status' => 'carrito',
            'rent_date' => \Carbon\Carbon::now(),
            'return_date' => \Carbon\Carbon::now()->addDays(15)
            ]);
        }

        // Añadir película al carrito
        $existingMovie = $cart->movie()->where('movie_id', $request->movie_id)->first();

        if ($existingMovie) {
            $cart->movie()->updateExistingPivot($request->movie_id, [
                'quantity' => $existingMovie->pivot->quantity + $request->quantity
            ]);
        } else {
            $cart->addMovie($request->movie_id, $request->quantity);
        }

        return redirect()->back()->with('success', 'Película añadida al carrito');
    }

    public function remove($movieId)
    {
        $cart = Rent::where('user_id', Auth::id())
                     ->where('status', 'carrito')
                     ->first();

        if ($cart) {
            $cart->removeMovie($movieId);
            return redirect()->back()->with('success', 'Película eliminada del carrito');
        }

        return redirect()->back()->with('error', 'No se encontró el carrito');
    }

    // Eliminar película del carrito
    public function destroy($movieId)
    {
        $cart = Rent::where('user_id', Auth::id())
                     ->where('status', 'carrito')
                     ->first();

        if ($cart) {
            $cart->removeMovie($movieId);
            return redirect()->back()->with('success', 'Película eliminada del carrito');
        }

        return redirect()->back()->with('error', 'No se encontró el carrito');
    }

    // Finalizar la renta (convertir carrito en renta)
    public function checkout()
    {
        // Obtener el carrito actual del usuario
        $cart = Rent::where('user_id', Auth::id())
                    ->where('status', 'carrito')
                    ->first();

        // Verificar si el carrito existe y tiene películas
        if ($cart && $cart->movie ->isNotEmpty()) {
            // Marcar el carrito como rentada
            $cart->update(['status' => 'rentada']);


            return redirect()->route('rents.index')
                            ->with('success', 'Renta completada');
        }

        return redirect()->back()->with('error', 'El carrito está vacío');
    }

    // Devolver películas y archivar la renta
    public function returnMovies($rentId)
    {
        $rent = Rent::where('id', $rentId, 'bigint')
                     ->where('user_id', $rentId = Rent::where('id', $rentId, 'bigint')->first()->user_id)
                     ->where('status', 'rentada')
                     ->first();

        if ($rent) {
            $rent->update(['status' => 'devuelta']);
            
            // Crear un nuevo carrito después de devolver las películas
            $newCart = Rent::create([
                'user_id' => Auth::id(),
                'status' => 'carrito',
                'rent_date' => \Carbon\Carbon::now(),
                'return_date' => \Carbon\Carbon::now()->addDays(15)
            ]);
            $newCart->movie()->detach();

            return redirect()->route('rents.index')
                             ->with('success', 'Películas devueltas y renta archivada. Nuevo carrito creado.');
        }

        return redirect()->back()->with('error', 'No se encontró la renta');
    }
    
}
