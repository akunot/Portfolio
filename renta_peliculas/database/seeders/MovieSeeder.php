<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('movies')->insert([
            ['name' => 'Inception', 'description' => 'Un ladrón que roba secretos a través del sueño.', 'year_release' => '2010-06-24', 'status' => '', 'image' => 'Inception.jpg'],
            ['name' => 'The Dark Knight', 'description' => 'Batman se enfrenta al Joker en Gotham.', 'year_release' => '2008-07-18', 'status' => '', 'image' => 'The Dark Knight.jpg'],
            ['name' => 'Interstellar', 'description' => 'Un viaje a través del espacio y el tiempo.', 'year_release' => '2014-11-07', 'status' => '', 'image' => 'Interstellar.jpg'],
            ['name' => 'The Matrix', 'description' => 'Un hacker descubre la verdad sobre su mundo.', 'year_release' => '1999-03-31', 'status' => '', 'image' => 'The Matrix.jpg'],
            ['name' => 'Titanic', 'description' => 'Una historia de amor en el trágico hundimiento.', 'year_release' => '1997-12-19', 'status' => '', 'image' => 'Titanic.jpg'],
            ['name' => 'Avatar', 'description' => 'Una aventura en un planeta alienígena.', 'year_release' => '2009-12-18', 'status' => '', 'image' => 'Avatar.jpg'],
            ['name' => 'The Godfather', 'description' => 'Historia de una familia mafiosa en EE.UU.', 'year_release' => '1972-03-24', 'status' => '', 'image' => 'The Godfather.jpg'],
            ['name' => 'Pulp Fiction', 'description' => 'Historias entrelazadas en el bajo mundo criminal.', 'year_release' => '1994-10-14', 'status' => '', 'image' => 'Pulp Fiction.jpg'],
            ['name' => 'Forrest Gump', 'description' => 'Un hombre con una vida extraordinaria.', 'year_release' => '1994-07-06', 'status' => '', 'image' => 'Forrest Gump.jpg'],
            ['name' => 'The Lord of the Rings', 'description' => 'Una épica aventura para destruir un anillo.', 'year_release' => '2001-12-19', 'status' => '', 'image' => 'The Lord of the Rings.jpg']
        ]);
    }
}
