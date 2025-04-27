<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiActorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/actors', [ApiActorController::class, 'index']);
Route::get('/actors/{id}', [ApiActorController::class, 'show']);
Route::post('/actors', [ApiActorController::class, 'store']);
Route::put('/actors/{id}', [ApiActorController::class, 'update']);
Route::delete('/actors/{id}', [ApiActorController::class, 'destroy']);
