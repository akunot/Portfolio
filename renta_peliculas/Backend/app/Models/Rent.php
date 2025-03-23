<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $fillable = ['user_id', 'status', 'rent_date', 'return_date'];

    public function user()
    {
        return $this->belongsTo(User::class); //Relacion 1:N con la tabla User
    }

    public function movie()
    {
        return $this->belongsToMany(Movie::class, 'rent_movies')->withPivot('quantity', 'price'); //Relacion N:M con la tabla Movie
    }

    // Método para agregar películas al carrito
    public function addMovie($movieId, $quantity = 1, $price = null)
    {
        $this->movie()->attach($movieId, [
            'quantity' => $quantity,
            'price' => $price ?? Movie::find($movieId)->price
        ]);
    }

    // Método para eliminar películas del carrito
    public function removeMovie($movieId)
    {
        $this->movie()->detach($movieId);
    }

    // Método para calcular el total del carrito
    public function getTotalAttribute()
    {
        return $this->movie->sum(function ($movie) {
            return $movie->pivot->quantity * $movie->pivot->price;
        });
    }

    
    use HasFactory;
}
