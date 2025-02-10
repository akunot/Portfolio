<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre_Movie extends Model
{
    public function movies()
    {
        return $this->hasMany(Movie::class); //Apunta a la tabla Movie
    }
    public function genres()
    {
        return $this->hasMany(Genre::class); //Apunta a la tabla Genre
    }
    use HasFactory;
}
