<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\TypeCarController;


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


Route::get('cars', [CarController::class, 'index'])->name('cars.index');
Route::post('cars', [CarController::class, 'store'])->name('cars.store');
Route::get('cars/{id}', [CarController::class, 'show'])->name('cars.show');
Route::get('cars/{id}', [CarController::class, 'edit'])->name('cars.edit');
Route::put('cars/{id}', [CarController::class, 'update'])->name('cars.update');
Route::delete('cars/{id}', [CarController::class, 'destroy'])->name('cars.destroy');

Route::get('routes', [RouteController::class, 'index'])->name('routes.index');
Route::post('routes', [RouteController::class, 'store'])->name('routes.store');
Route::get('routes/{id}', [RouteController::class, 'show'])->name('routes.show');
Route::get('routes/{id}', [RouteController::class, 'edit'])->name('routes.edit');
Route::put('routes/{id}', [RouteController::class, 'update'])->name('routes.update');
Route::delete('routes/{id}', [RouteController::class, 'destroy'])->name('routes.destroy');

Route::get('type_cars', [TypeCarController::class, 'index'])->name('type_cars.index');
Route::post('type_cars', [TypeCarController::class, 'store'])->name('type_cars.store');
Route::get('type_cars/{id}', [TypeCarController::class, 'show'])->name('type_cars.show');
Route::get('type_cars/{id}', [TypeCarController::class, 'edit'])->name('type_cars.edit');
Route::put('type_cars/{id}', [TypeCarController::class, 'update'])->name('type_cars.update');
Route::delete('type_cars/{id}', [TypeCarController::class, 'destroy'])->name('type_cars.destroy');

