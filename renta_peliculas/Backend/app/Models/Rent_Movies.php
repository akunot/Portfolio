<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent_Movies extends Model
{
    public function rent()
    {
        return $this->hasMany(Rent::class); //Apunta a la tabla Rent
    }

    public function movie()
    {
        return $this->hasMany(Movie::class); //Apunta a la tabla Movie
    }
    
    use HasFactory;
}
