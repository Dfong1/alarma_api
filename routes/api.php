<?php

use App\Http\Controllers\HistorialController;
use App\Http\Controllers\PaqueteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/paquetes/index', [PaqueteController::class, 'index']);
Route::post('/paquetes/create', [PaqueteController::class, 'store']);
Route::put('/paquetes/edit/{id}', [PaqueteController::class, 'update']);
Route::delete('/paquetes/delete/{id}', [PaqueteController::class, 'delete']);
Route::get('/paquetes/show/{id}', [PaqueteController::class, 'show']);

Route::get('/historial/index/{id}', [HistorialController::class, 'index']);
Route::post('/historial/post', [HistorialController::class, 'store']);

