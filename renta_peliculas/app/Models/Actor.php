<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'actor_movies'); //Relacion N:M con la tabla Actor_Movie
    }

    use HasFactory;
}
