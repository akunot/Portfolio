<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'director_movies'); //Relacion N:M con la tabla Movie
    }

    use HasFactory;
}
