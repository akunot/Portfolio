<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RentsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('rents')->insert([
            [
                'movie_id' => 1,
                'user_id' => 1,
                'rent_date' => Carbon::now()->subDays(10),
                'return_date' => Carbon::now()->subDays(5),
                'payment_method' => 'Tarjeta de Crédito',
                'amount' => 5000,
                'status' => 'Pago',
                
            ],
            [
                'movie_id' => 2,
                'user_id' => 2,
                'rent_date' => Carbon::now()->subDays(8),
                'return_date' => Carbon::now()->subDays(3),
                'payment_method' => 'Efectivo',
                'amount' => 7000,
                'status' => 'No Pago',
                
            ],
            [
                'movie_id' => 3,
                'user_id' => 3,
                'rent_date' => Carbon::now()->subDays(7),
                'return_date' => Carbon::now()->subDays(2),
                'payment_method' => 'Paypal',
                'amount' => 6000,
                'status' => 'Pago',
                
            ],
            [
                'movie_id' => 4,
                'user_id' => 4,
                'rent_date' => Carbon::now()->subDays(6),
                'return_date' => Carbon::now()->subDay(),
                'payment_method' => 'Tarjeta Débito',
                'amount' => 5500,
                'status' => 'No Pago',
                
            ],
            [
                'movie_id' => 5,
                'user_id' => 5,
                'rent_date' => Carbon::now()->subDays(5),
                'return_date' => Carbon::now(),
                'payment_method' => 'Efectivo',
                'amount' => 8000,
                'status' => 'Pago',
                
            ],
            [
                'movie_id' => 6,
                'user_id' => 6,
                'rent_date' => Carbon::now()->subDays(4),
                'return_date' => Carbon::now()->addDay(),
                'payment_method' => 'Tarjeta de Crédito',
                'amount' => 6200,
                'status' => 'Pago',
                
            ],
            [
                'movie_id' => 7,
                'user_id' => 7,
                'rent_date' => Carbon::now()->subDays(3),
                'return_date' => Carbon::now()->addDays(2),
                'payment_method' => 'Paypal',
                'amount' => 4500,
                'status' => 'No Pago',
                
            ],
            [
                'movie_id' => 8,
                'user_id' => 8,
                'rent_date' => Carbon::now()->subDays(2),
                'return_date' => Carbon::now()->addDays(3),
                'payment_method' => 'Tarjeta Débito',
                'amount' => 7500,
                'status' => 'Pago',
                
            ],
            [
                'movie_id' => 9,
                'user_id' => 9,
                'rent_date' => Carbon::now()->subDay(),
                'return_date' => Carbon::now()->addDays(4),
                'payment_method' => 'Efectivo',
                'amount' => 9000,
                'status' => 'No Pago',
                
            ],
            [
                'movie_id' => 10,
                'user_id' => 10,
                'rent_date' => Carbon::now(),
                'return_date' => Carbon::now()->addDays(5),
                'payment_method' => 'Tarjeta de Crédito',
                'amount' => 5000,
                'status' => 'Pago',
                
            ],
            ]);
    }
}

