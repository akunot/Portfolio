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
                'user_id' => 1,
                'rent_date' => Carbon::now()->subDays(10),
                'return_date' => Carbon::now()->subDays(5),
                'status' => 'Pago',
                
            ],
            [
                'user_id' => 2,
                'rent_date' => Carbon::now()->subDays(8),
                'return_date' => Carbon::now()->subDays(3),
                'status' => 'No Pago',
                
            ],
            [
                'user_id' => 3,
                'rent_date' => Carbon::now()->subDays(7),
                'return_date' => Carbon::now()->subDays(2),
                'status' => 'Pago',
                
            ],
            [
                'user_id' => 4,
                'rent_date' => Carbon::now()->subDays(6),
                'return_date' => Carbon::now()->subDay(),
                'status' => 'No Pago',
                
            ],
            [
                'user_id' => 5,
                'rent_date' => Carbon::now()->subDays(5),
                'return_date' => Carbon::now(),
                'status' => 'Pago',
                
            ],
            [
                'user_id' => 6,
                'rent_date' => Carbon::now()->subDays(4),
                'return_date' => Carbon::now()->addDay(),
                'status' => 'Pago',
                
            ],
            [
                'user_id' => 7,
                'rent_date' => Carbon::now()->subDays(3),
                'return_date' => Carbon::now()->addDays(2),
                'status' => 'No Pago',
                
            ],
            [
                'user_id' => 8,
                'rent_date' => Carbon::now()->subDays(2),
                'return_date' => Carbon::now()->addDays(3),
                'status' => 'Pago',
                
            ],
            [
                'user_id' => 9,
                'rent_date' => Carbon::now()->subDay(),
                'return_date' => Carbon::now()->addDays(4),
                'status' => 'No Pago',
                
            ],
            [
                'user_id' => 10,
                'rent_date' => Carbon::now(),
                'return_date' => Carbon::now()->addDays(5),
                'status' => 'Pago',
                
            ],
            ]);
    }
}

