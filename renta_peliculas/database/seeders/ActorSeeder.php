<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('actors')->insert([
            ['name' => 'Robert Downey Jr.', 'date_birth' => '1965-04-04', 'nationality' => 'USA', 'image' => 'Robert Downey Jr.jpg', 'biography' => 'Robert Downey Jr. is an American actor and producer.'],
            ['name' => 'Scarlett Johansson', 'date_birth' => '1984-11-22', 'nationality' => 'USA', 'image' => 'Scarlett Johansson.jpg', 'biography' => 'Scarlett Johansson is an American actress and singer.'],
            ['name' => 'Leonardo DiCaprio', 'date_birth' => '1974-11-11', 'nationality' => 'USA', 'image' => 'Leonardo DiCaprio.jpg', 'biography' => 'Leonardo DiCaprio is an American actor and film producer.'],
            ['name' => 'Jennifer Lawrence', 'date_birth' => '1990-08-15', 'nationality' => 'USA', 'image' => 'Jennifer Lawrence.jpg', 'biography' => 'Jennifer Lawrence is an American actress.'],
            ['name' => 'Tom Cruise', 'date_birth' => '1962-07-03', 'nationality' => 'USA', 'image' => 'Tom Cruise.jpg', 'biography' => 'Tom Cruise is an American actor and producer.'],
            ['name' => 'Natalie Portman', 'date_birth' => '1981-06-09', 'nationality' => 'Israel', 'image' => 'Natalie Portman.jpg', 'biography' => 'Natalie Portman is an Israeli-American actress and filmmaker.'],
            ['name' => 'Brad Pitt', 'date_birth' => '1963-12-18', 'nationality' => 'USA', 'image' => 'Brad Pitt.jpg', 'biography' => 'Brad Pitt is an American actor and film producer.'],
            ['name' => 'Emma Watson', 'date_birth' => '1990-04-15', 'nationality' => 'UK', 'image' => 'Emma Watson.jpg', 'biography' => 'Emma Watson is a British actress and activist.'],
            ['name' => 'Denzel Washington', 'date_birth' => '1954-12-28', 'nationality' => 'USA', 'image' => 'Denzel Washington.jpg', 'biography' => 'Denzel Washington is an American actor, director, and producer.'],
            ['name' => 'Morgan Freeman', 'date_birth' => '1937-06-01', 'nationality' => 'USA', 'image' => 'Morgan Freeman.jpg', 'biography' => 'Morgan Freeman is an American actor, director, and narrator.']
        ]);
    }
}

