<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FireController;
use App\Http\Controllers\FlaskController;

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

Route::get('/fires', [FireController::class, 'index']);
Route::post('/fires', [FireController::class, 'store']);
Route::get('/fires/{id}', [FireController::class, 'show']);
Route::put('/fires/{id}', [FireController::class, 'update']);
Route::delete('/fires{id}', [FireController::class, 'destroy']);

Route::post('/flask', [FlaskController::class, 'flask']);
