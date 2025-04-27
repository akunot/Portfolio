<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ActorMovieSeeder extends Seeder
{
    public function run()
    {
        DB::table('actor_movies')->insert([
            ['actor_id' => 1, 'movie_id' => 3],
            ['actor_id' => 2, 'movie_id' => 5],
            ['actor_id' => 3, 'movie_id' => 2],
            ['actor_id' => 4, 'movie_id' => 1],
            ['actor_id' => 5, 'movie_id' => 6],
            ['actor_id' => 6, 'movie_id' => 4],
            ['actor_id' => 7, 'movie_id' => 8],
            ['actor_id' => 8, 'movie_id' => 10],
            ['actor_id' => 9, 'movie_id' => 9],
            ['actor_id' => 10, 'movie_id' => 7],
            ['actor_id' => 1, 'movie_id' => 4],
            ['actor_id' => 2, 'movie_id' => 6],
            ['actor_id' => 3, 'movie_id' => 8],
            ['actor_id' => 4, 'movie_id' => 10],
            ['actor_id' => 5, 'movie_id' => 9],
            ['actor_id' => 6, 'movie_id' => 7],
            ['actor_id' => 7, 'movie_id' => 5],
            ['actor_id' => 8, 'movie_id' => 3],
            ['actor_id' => 9, 'movie_id' => 2],
            ['actor_id' => 10, 'movie_id' => 1],
            ['actor_id' => 1, 'movie_id' => 7],
            ['actor_id' => 2, 'movie_id' => 9],
            ['actor_id' => 3, 'movie_id' => 10],
            ['actor_id' => 4, 'movie_id' => 8],
            ['actor_id' => 5, 'movie_id' => 2],
            ['actor_id' => 6, 'movie_id' => 1],
            ['actor_id' => 7, 'movie_id' => 4],
            ['actor_id' => 8, 'movie_id' => 6],
            ['actor_id' => 9, 'movie_id' => 5],
            ['actor_id' => 10, 'movie_id' => 3]
        ]);
    }
}

