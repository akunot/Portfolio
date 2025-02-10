<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'actor_movies'); //Relacion N:M con la tabla Actor_Movie
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_movies'); //Relacion N:M con la tabla Genre
    }

    public function directors()
    {
        return $this->belongsToMany(Director::class, 'director_movies'); //Relacion N:M con la tabla Director
    }

    public function rents()
    {
        return $this->hasMany(Rent::class); //Relacion 1:N con la tabla Rent
    }

    use HasFactory;



    protected $fillable = ['title', 'description', 'image', 'genre_id'];

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'movie_id');
    }
}
