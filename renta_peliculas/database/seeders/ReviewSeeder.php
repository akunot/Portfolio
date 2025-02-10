<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('reviews')->insert([
            [
                'rating' => 5,
                'comment' => 'Excelente película, la mejor que he visto en años.',
                'review_date' => Carbon::now()->subDays(10),
                'movie_id' => 1,
                'user_id' => 1,
            ],
            [
                'rating' => 4,
                'comment' => 'Muy buena historia, aunque el final fue predecible.',
                'review_date' => Carbon::now()->subDays(8),
                'movie_id' => 2,
                'user_id' => 2,
            ],
            [
                'rating' => 3,
                'comment' => 'Entretenida, pero esperaba más del director.',
                'review_date' => Carbon::now()->subDays(6),
                'movie_id' => 3,
                'user_id' => 3,
            ],
            [
                'rating' => 2,
                'comment' => 'La trama no me atrapó, demasiado lenta.',
                'review_date' => Carbon::now()->subDays(4),
                'movie_id' => 4,
                'user_id' => 4,
            ],
            [
                'rating' => 1,
                'comment' => 'Pésima película, no la recomiendo para nada.',
                'review_date' => Carbon::now()->subDays(2),
                'movie_id' => 5,
                'user_id' => 5,
            ],
            [
                'rating' => 5,
                'comment' => 'Una obra maestra, actuaciones impecables.',
                'review_date' => Carbon::now()->subDays(12),
                'movie_id' => 6,
                'user_id' => 6,
            ],
            [
                'rating' => 4,
                'comment' => 'La banda sonora es espectacular.',
                'review_date' => Carbon::now()->subDays(15),
                'movie_id' => 7,
                'user_id' => 7,
            ],
            [
                'rating' => 3,
                'comment' => 'Buena película, pero me quedo con el libro.',
                'review_date' => Carbon::now()->subDays(20),
                'movie_id' => 8,
                'user_id' => 8,
            ],
            [
                'rating' => 2,
                'comment' => 'Los efectos especiales no fueron buenos.',
                'review_date' => Carbon::now()->subDays(25),
                'movie_id' => 9,
                'user_id' => 9,
            ],
            [
                'rating' => 1,
                'comment' => 'Pésimo guion, actuaciones forzadas.',
                'review_date' => Carbon::now()->subDays(30),
                'movie_id' => 10,
                'user_id' => 10,
            ],
            ],
        );
    }
}

