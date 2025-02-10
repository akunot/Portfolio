<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'name' => 'Admin',
                'description' => 'Administrador con acceso completo a todas las funciones del sistema.',
            ],
            [
                'name' => 'User',
                'description' => 'Usuario con permisos limitados, solo puede consultar y calificar contenido.',
            ],
        ]);
    }
}

