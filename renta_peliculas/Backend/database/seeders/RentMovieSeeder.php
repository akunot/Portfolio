<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RentMovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rent_movies')->insert([
            [
                'rent_id' => 1,
                'movie_id' => 1,
            ],
            [
                'rent_id' => 1,
                'movie_id' => 2,
            ],
            [
                'rent_id' => 1,
                'movie_id' => 3,
            ],
            [
                'rent_id' => 2,
                'movie_id' => 4,
            ],
            [
                'rent_id' => 2,
                'movie_id' => 5,
            ],
            [
                'rent_id' => 2,
                'movie_id' => 6,
            ],
            ]);
    }
}
