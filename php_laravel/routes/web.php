<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CocheController;
use App\Http\Controllers\PropietarioController;
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

Route::get('/', [CocheController::class, 'index'])->name('coches.index');
Route::get('/coches/create', [CocheController::class, 'create'])->name('coches.create');
Route::post('/coches', [CocheController::class, 'store'])->name('coches.store');
Route::put('/coches/{id}', [CocheController::class, 'update'])->name('coches.update');
Route::delete('/coches/{id}', [CocheController::class, 'destroy'])->name('coches.destroy');

Route::get('/propietarios', [PropietarioController::class, 'index'])->name('propietarios.index');
Route::get('/propietarios/create', [PropietarioController::class, 'create'])->name('propietarios.create'); 
Route::post('/propietarios', [PropietarioController::class, 'store'])->name('propietarios.store');
Route::delete('/propietarios/{id}', [PropietarioController::class, 'destroy'])->name('propietarios.destroy');
Route::get('/coches/por-propietario/{propietarioId}', [CocheController::class, 'cochesPorPropietario'])->name('coches.por-propietario');