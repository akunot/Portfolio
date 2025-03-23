<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('movies')->insert([
            ['name' => 'Inception', 'description' => 'Un ladrón que roba secretos a través del sueño.', 'price' => 50000, 'year_release' => '2010-06-24', 'image' => 'Inception.jpg'],
            ['name' => 'The Dark Knight', 'description' => 'Batman se enfrenta al Joker en Gotham.', 'price' => 20000, 'year_release' => '2008-07-18', 'image' => 'The Dark Knight.jpg'],
            ['name' => 'Interstellar', 'description' => 'Un viaje a través del espacio y el tiempo.', 'price' => 10000, 'year_release' => '2014-11-07', 'image' => 'Interstellar.jpg'],
            ['name' => 'The Matrix', 'description' => 'Un hacker descubre la verdad sobre su mundo.', 'price' => 25000, 'year_release' => '1999-03-31', 'image' => 'The Matrix.jpg'],
            ['name' => 'Titanic', 'description' => 'Una historia de amor en el trágico hundimiento.', 'price' => 10000, 'year_release' => '1997-12-19', 'image' => 'Titanic.jpg'],
            ['name' => 'Avatar', 'description' => 'Una aventura en un planeta alienígena.', 'price' => 23000, 'year_release' => '2009-12-18', 'image' => 'Avatar.jpg'],
            ['name' => 'The Godfather', 'description' => 'Historia de una familia mafiosa en EE.UU.', 'price' => 12000, 'year_release' => '1972-03-24', 'image' => 'The Godfather.jpg'],
            ['name' => 'Pulp Fiction', 'description' => 'Historias entrelazadas en el bajo mundo criminal.', 'price' => 15000, 'year_release' => '1994-10-14', 'image' => 'Pulp Fiction.jpg'],
            ['name' => 'Forrest Gump', 'description' => 'Un hombre con una vida extraordinaria.', 'price' => 12000, 'year_release' => '1994-07-06', 'image' => 'Forrest Gump.jpg'],            
            ['name' => 'The Lord of the Rings', 'description' => 'Una épica aventura para destruir un anillo.', 'price' => 20000, 'year_release' => '2001-12-19', 'image' => 'The Lord of the Rings.jpg'],
        ]);
    }
}
