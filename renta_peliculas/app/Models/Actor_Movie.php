<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor_Movie extends Model
{
    public function movies()
    {
        return $this->hasMany(Movie::class); //Apunta a la tabla Movie
    }
    public function actors()
    {
        return $this->hasMany(Actor::class); //Apunta a la tabla Movie
    }

    use HasFactory;
}
