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
use App\Http\Controllers\AdminController;

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

Route::middleware('auth', 'role:1')->group(function () {
    
    /* Rutas del controlador ActorController */
    Route::get('/actor/create', [ActorController::class, 'create'])->name('actors.create');
    Route::post('/actor', [ActorController::class, 'store'])->name('actors.store');
    Route::get('/actor/{id}/edit', [ActorController::class, 'edit'])->name('actors.edit');
    Route::put('/actor/{id}', [ActorController::class, 'update'])->name('actors.update');
    Route::delete('/actor/{id}', [ActorController::class, 'destroy'])->name('actors.destroy');

    /* Rutas del controlador MovieController */
    Route::get('/movie/create', [MovieController::class, 'create'])->name('movies.create');
    Route::post('/movie', [MovieController::class, 'store'])->name('movies.store');
    Route::get('/movie/{id}/edit', [MovieController::class, 'edit'])->name('movies.edit');
    Route::put('/movie/{id}', [MovieController::class, 'update'])->name('movies.update');
    Route::delete('/movie/{id}', [MovieController::class, 'destroy'])->name('movies.destroy');

    /* Rutas del controlador GenreController */
    Route::get('/genre', [GenreController::class, 'index'])->name('genres.index');
    Route::get('/genre/{id}', [GenreController::class, 'show'])->name('genres.show');
    Route::get('/genre/create', [GenreController::class, 'create'])->name('genres.create');
    Route::post('/genre', [GenreController::class, 'store'])->name('genres.store');
    Route::get('/genre/{id}/edit', [GenreController::class, 'edit'])->name('genres.edit');
    Route::put('/genre/{id}', [GenreController::class, 'update'])->name('genres.update');
    Route::put('/genre/{id}', [GenreController::class, 'destroy'])->name('genres.destroy');

    /* Rutas del controlador DirectorController */
    Route::get('/director/create', [DirectorController::class, 'create'])->name('directors.create');
    Route::post('/director', [DirectorController::class, 'store'])->name('directors.store');
    Route::get('/director/{id}/edit', [DirectorController::class, 'edit'])->name('directors.edit');
    Route::put('/director/{id}', [DirectorController::class, 'update'])->name('directors.update');
    Route::delete('/director/{id}', [DirectorController::class, 'destroy'])->name('directors.destroy');

    /* Ruta para el dashboard */
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    /* Rutas del controlador UserController */
    Route::get('/user', [UserController::class, 'index'])->name('users.index');
    Route::post('/user', [UserController::class, 'store'])->name('users.store');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('users.destroy');    

});

Route::middleware('auth')->group(function () {

    /* Rutas del controlador UserController */
    Route::get('/user', [UserController::class, 'index'])->name('users.index');
    Route::post('/user', [UserController::class, 'store'])->name('users.store');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('users.update');

    /* Rutas del controlador RentController */
    Route::get('/rent', [RentController::class, 'index'])->name('rents.index');
    Route::post('/rent', [RentController::class, 'store'])->name('rents.store');
    Route::delete('/rent/{id}', [RentController::class, 'destroy'])->name('rents.destroy');
    Route::delete('/rent/{id}/remove', [RentController::class, 'remove'])->name('rents.remove');
    Route::post('/rent/checkout', [RentController::class, 'checkout'])->name('rents.checkout');

    /* Rutas del controlador ReviewController */
    Route::get('/review/create/{id}', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('/review', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/review/{id}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
    Route::put('/review/{id}', [ReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/review/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

    /* Confirmación de devolución */
    Route::put('/rent/{id}/return', [RentController::class, 'returnMovies'])->name('rents.return');
});

Route::get('/actor', [ActorController::class, 'index'])->name('actors.index');
Route::get('/actor/{id}', [ActorController::class, 'show'])->name('actors.show');

Route::get('/', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movies.show');

Route::get('/director', [DirectorController::class, 'index'])->name('directors.index');
Route::get('/director/{id}', [DirectorController::class, 'show'])->name('directors.show');

Route::get('/movie/review', [ReviewController::class, 'index'])->name('review.index');

Route::get('/user/{id}', [UserController::class, 'show'])->name('users.show');

/* Route::get('/role', [RoleController::class, 'index'])->name('roles.index');
Route::get('/role/create', [RoleController::class, 'create'])->name('roles.create');
Route::post('/role', [RoleController::class, 'store'])->name('roles.store');
Route::get('/role/{id}', [RoleController::class, 'show'])->name('roles.show');
Route::get('/role/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
Route::put('/role/{id}', [RoleController::class, 'update'])->name('roles.update');
Route::delete('/role/{id}', [RoleController::class, 'destroy'])->name('roles.destroy'); */


Route::get('/about-us', function () {
    return view('about_us');
})->name('about');


Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/mapa', function () {
    return view('mapa');
});


Route::middleware(['Users'])->group(function () {
    Route::get('/user', [UserController::class, 'editar'])->name('user.editar');
    Route::put('/user', [UserController::class, 'actualizar'])->name('user.actualizar');
});
