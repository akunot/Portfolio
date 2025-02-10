<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('genres')->insert([
            ['name' => 'Acción', 'description' => 'Películas con escenas de combate, explosiones y persecuciones.'],
            ['name' => 'Aventura', 'description' => 'Historias de exploración y viajes emocionantes.'],
            ['name' => 'Ciencia Ficción', 'description' => 'Películas con tecnología avanzada y mundos futuristas.'],
            ['name' => 'Comedia', 'description' => 'Películas diseñadas para hacer reír al público.'],
            ['name' => 'Drama', 'description' => 'Historias emocionales y realistas que exploran conflictos humanos.'],
            ['name' => 'Fantasía', 'description' => 'Historias ambientadas en mundos mágicos con criaturas fantásticas.'],
            ['name' => 'Terror', 'description' => 'Películas que buscan generar miedo y suspenso.'],
            ['name' => 'Misterio', 'description' => 'Historias con enigmas y secretos que deben resolverse.'],
            ['name' => 'Romance', 'description' => 'Películas centradas en historias de amor y relaciones.'],
            ['name' => 'Thriller', 'description' => 'Películas de suspenso con giros inesperados y tensión constante.']
        ]);
    }
}

