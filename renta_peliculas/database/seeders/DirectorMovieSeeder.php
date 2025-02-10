<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirectorMovieSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('director_movies')->insert([
            ['director_id' => 1, 'movie_id' => 2],
            ['director_id' => 2, 'movie_id' => 4],
            ['director_id' => 3, 'movie_id' => 6],
            ['director_id' => 4, 'movie_id' => 8],
            ['director_id' => 5, 'movie_id' => 10],
            ['director_id' => 6, 'movie_id' => 9],
            ['director_id' => 7, 'movie_id' => 7],
            ['director_id' => 8, 'movie_id' => 5],
            ['director_id' => 9, 'movie_id' => 3],
            ['director_id' => 10, 'movie_id' => 1],
            ['director_id' => 1, 'movie_id' => 5],
            ['director_id' => 2, 'movie_id' => 7],
            ['director_id' => 3, 'movie_id' => 9],
            ['director_id' => 4, 'movie_id' => 10],
            ['director_id' => 5, 'movie_id' => 8],
            ['director_id' => 6, 'movie_id' => 6],
            ['director_id' => 7, 'movie_id' => 4],
            ['director_id' => 8, 'movie_id' => 2],
            ['director_id' => 9, 'movie_id' => 1],
            ['director_id' => 10, 'movie_id' => 3],
            ['director_id' => 1, 'movie_id' => 6],
            ['director_id' => 2, 'movie_id' => 8],
            ['director_id' => 3, 'movie_id' => 10],
            ['director_id' => 4, 'movie_id' => 9],
            ['director_id' => 5, 'movie_id' => 7],
            ['director_id' => 6, 'movie_id' => 5],
            ['director_id' => 7, 'movie_id' => 3],
            ['director_id' => 8, 'movie_id' => 1],
            ['director_id' => 9, 'movie_id' => 2],
            ['director_id' => 10, 'movie_id' => 4],
        ]);
    }
}
