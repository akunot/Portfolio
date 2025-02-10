<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirectorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('directors')->insert([
            ['name' => 'Steven Spielberg', 'date_birth' => '1946-12-18', 'nationality' => 'USA', 'image' => 'Steven Spielberg.jpg', 'biography' => 'Steven Spielberg is an American film director, producer, and screenwriter.'],
            ['name' => 'Christopher Nolan', 'date_birth' => '1970-07-30', 'nationality' => 'UK', 'image' => 'Christopher Nolan.jpg', 'biography' => 'Christopher Nolan is a British-American film director, producer, and screenwriter.'],
            ['name' => 'Quentin Tarantino', 'date_birth' => '1963-03-27', 'nationality' => 'USA', 'image' => 'Quentin Tarantino.jpg', 'biography' => 'Quentin Tarantino is an American film director, producer, screenwriter, and actor.'],
            ['name' => 'Martin Scorsese', 'date_birth' => '1942-11-17', 'nationality' => 'USA', 'image' => 'Martin Scorsese.jpg', 'biography' => 'Martin Scorsese is an American film director, producer, screenwriter, and actor.'],
            ['name' => 'James Cameron', 'date_birth' => '1954-08-16', 'nationality' => 'Canada', 'image' => 'James Cameron.jpg', 'biography' => 'James Cameron is a Canadian film director, producer, and screenwriter.'],
            ['name' => 'Ridley Scott', 'date_birth' => '1937-11-30', 'nationality' => 'UK', 'image' => 'Ridley Scott.jpg', 'biography' => 'Ridley Scott is a British film director and producer.'],
            ['name' => 'Guillermo del Toro', 'date_birth' => '1964-10-09', 'nationality' => 'Mexico', 'image' => 'Guillermo del Toro.jpg', 'biography' => 'Guillermo del Toro is a Mexican film director, producer, and screenwriter.'],
            ['name' => 'Peter Jackson', 'date_birth' => '1961-10-31', 'nationality' => 'New Zealand', 'image' => 'Peter Jackson.jpg', 'biography' => 'Peter Jackson is a New Zealand film director, producer, and screenwriter.'],
            ['name' => 'Tim Burton', 'date_birth' => '1958-08-25', 'nationality' => 'USA', 'image' => 'Tim Burton.jpg', 'biography' => 'Tim Burton is an American film director, producer, artist, writer, and animator.'],
            ['name' => 'Alfonso Cuarón', 'date_birth' => '1961-11-28', 'nationality' => 'Mexico', 'image' => 'Alfonso Cuarón.jpg', 'biography' => 'Alfonso Cuarón is a Mexican film director, producer, and screenwriter.']
        ]);
    }
}

