<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class); //Relacion 1:N con la tabla User
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class); //Relacion 1:N con la tabla Movie
    }
    

    use HasFactory;
}
