<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director_Movie extends Model
{

    public function movies()
    {
        return $this->hasMany(Movie::class); //Apunta a la tabla Movie
    }
    public function directors()
    {
        return $this->hasMany(Director::class); //Apunta a la tabla Director
    }

    use HasFactory;
}
