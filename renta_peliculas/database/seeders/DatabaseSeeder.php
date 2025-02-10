<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ActorSeeder::class,
            DirectorSeeder::class,
            GenreSeeder::class,
            MovieSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            RentsSeeder::class,
            ReviewSeeder::class,
            ActorMovieSeeder::class,
            DirectorMovieSeeder::class,
            GenreMovieSeeder::class,
        ]);
    }
}

