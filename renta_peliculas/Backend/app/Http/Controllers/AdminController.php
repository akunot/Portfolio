<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Rent;
use App\Models\Review;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\Director;
use App\Models\Actor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    // AdminController.php
    public function dashboard()
    {
        // Métricas principales
        $metrics = [
            'total_users' => User::count(),
            'total_movies' => Movie::count(),
            'active_rents' => Rent::where('status', 'rentada')->count(),
            'pending_rents_users' => User::whereHas('rents', function($query) {
                $query->where('status', 'rentada');
            })->get(),
            'total_revenue' => Rent::with('movie')
                ->get()
                ->sum(fn($rent) => $rent->movie->sum(fn($movie) => $movie->pivot->quantity * $movie->pivot->price))
        ];

        // Obtener las últimas rentas con películas cargadas
        $recentActivity = [
            'latest_rents' => Rent::with('movie')->latest()->take(5)->get(),
            'new_users' => User::latest()->take(5)->get(),
            'recent_reviews' => Review::with('user', 'movie')->latest()->take(5)->get()
        ];

        // Estadísticas de uso
        $usageStats = [
            'most_rented_movies' => Movie::withCount('rents')->orderByDesc('rents_count')->take(5)->get(),
            'most_active_users' => User::withCount('rents')->orderByDesc('rents_count')->take(5)->get(),
            'most_viewed_movies' => Movie::withCount('reviews')->orderByDesc('reviews_count')->take(5)->get(),
        ];
        return view('admin.index', compact('metrics', 'recentActivity', 'usageStats'));
    
    }

}
