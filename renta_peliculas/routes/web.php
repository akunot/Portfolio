<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\Actor_MovieController;
use App\Http\Controllers\Genre_MovieController;
use App\Http\Controllers\Director_MovieController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('movies.index');
});

Route::get('/actor', [ActorController::class, 'index'])->name('actors.index');
Route::get('/actor/create', [ActorController::class, 'create'])->name('actors.create');
Route::post('/actor', [ActorController::class, 'store'])->name('actors.store');
Route::get('/actor/{id}', [ActorController::class, 'show'])->name('actors.show');
Route::get('/actor/{id}/edit', [ActorController::class, 'edit'])->name('actors.edit');
Route::put('/actor/{id}', [ActorController::class, 'update'])->name('actors.update');
Route::delete('/actor/{id}', [ActorController::class, 'destroy'])->name('actors.destroy');



Route::get('/', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movie/create', [MovieController::class, 'create'])->name('movies.create');
Route::post('/movie', [MovieController::class, 'store'])->name('movies.store');
Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movies.show');
Route::get('/movie/{id}/edit', [MovieController::class, 'edit'])->name('movies.edit');
Route::put('/movie/{id}', [MovieController::class, 'update'])->name('movies.update');
Route::delete('/movie/{id}', [MovieController::class, 'destroy'])->name('movies.destroy');



Route::get('/genre', [GenreController::class, 'index'])->name('genres.index');
Route::get('/genre/create', [GenreController::class, 'create'])->name('genres.create');
Route::post('/genre', [GenreController::class, 'store'])->name('genres.store');
Route::get('/genre/{id}', [GenreController::class, 'show'])->name('genres.show');
Route::get('/genre/{id}/edit', [GenreController::class, 'edit'])->name('genres.edit');
Route::put('/genre/{id}', [GenreController::class, 'update'])->name('genres.update');
Route::put('/genre/{id}', [GenreController::class, 'destroy'])->name('genres.destroy');



Route::get('/director', [DirectorController::class, 'index'])->name('directors.index');
Route::get('/director/create', [DirectorController::class, 'create'])->name('directors.create');
Route::post('/director', [DirectorController::class, 'store'])->name('directors.store');
Route::get('/director/{id}', [DirectorController::class, 'show'])->name('directors.show');
Route::get('/director/{id}/edit', [DirectorController::class, 'edit'])->name('directors.edit');
Route::put('/director/{id}', [DirectorController::class, 'update'])->name('directors.update');
Route::delete('/director/{id}', [DirectorController::class, 'destroy'])->name('directors.destroy');


Route::get('/rent', [RentController::class, 'index'])->name('rents.index');
Route::get('/rent/create', [RentController::class, 'create'])->name('rents.create');
Route::post('/rent', [RentController::class, 'store'])->name('rents.store');
Route::get('/rent/{id}', [RentController::class, 'show'])->name('rents.show');
Route::get('/rent/{id}/edit', [RentController::class, 'edit'])->name('rents.edit');
Route::put('/rent/{id}', [RentController::class, 'update'])->name('rents.update');
Route::delete('/rent/{id}', [RentController::class, 'destroy'])->name('rents.destroy');



Route::get('/review', [ReviewController::class, 'index'])->name('reviews.index');
Route::get('/review/create/{id}', [ReviewController::class, 'create'])->name('reviews.create');
Route::post('/review', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/review/{id}', [ReviewController::class, 'show'])->name('reviews.show');
Route::get('/review/{id}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
Route::put('/review/{id}', [ReviewController::class, 'update'])->name('reviews.update');
Route::delete('/review/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
Route::get('/movie/review', [ReviewController::class, 'index'])->name('review.index');




Route::get('/user', [UserController::class, 'index'])->name('users.index');
Route::get('/user/create', [UserController::class, 'create'])->name('users.create');
Route::post('/user', [UserController::class, 'store'])->name('users.store');
Route::get('/user/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('users.destroy');



Route::get('/role', [RoleController::class, 'index'])->name('roles.index');
Route::get('/role/create', [RoleController::class, 'create'])->name('roles.create');
;Route::post('/role', [RoleController::class, 'store'])->name('roles.store');
Route::get('/role/{id}', [RoleController::class, 'show'])->name('roles.show');
Route::get('/role/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
;Route::put('/role/{id}', [RoleController::class, 'update'])->name('roles.update');
Route::delete('/role/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');



Route::get('/actor_movie', [Actor_MovieController::class, 'index'])->name('actor_movie.index');
Route::post('/actor_movie', [Actor_MovieController::class, 'store'])->name('actor_movie.store');

Route::get('/genre_movie', [Genre_MovieController::class, 'index'])->name('genre_movie.index');
Route::post('/genre_movie', [Genre_MovieController::class, 'store'])->name('genre_movie.store');

Route::get('/director_movie', [Director_MovieController::class, 'index'])->name('director_movie.index');
Route::post('/director_movie', [Director_MovieController::class, 'store'])->name('director_movie.store');




Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show');
Route::get('/movies/{id}/edit', [MovieController::class, 'edit'])->name('movies.edit');
Route::delete('/movies/{id}', [MovieController::class, 'destroy'])->name('movies.destroy');

