<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('/mesa', \App\Http\Controllers\Api\MesaApiController::class);
    Route::ApiResource('/reserva', \App\Http\Controllers\Api\ReservaApiController::class);
    Route::post('/logout', [\App\Http\Controllers\Api\Auth\AuthController::class, 'logout']);
} );
Route::post('/login', [\App\Http\Controllers\Api\Auth\AuthController::class, 'login']);


Route::post('/register', [\App\Http\Controllers\Api\Auth\AuthController::class, 'register']);


//teste
//Route::get('/login', [\App\Http\Controllers\Api\Auth\AuthController::class, 'index'])->middleware('auth:sanctum');
