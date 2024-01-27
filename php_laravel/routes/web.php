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

Route::resource('coches', CocheController::class);
Route::resource('propietarios', PropietarioController::class);
Route::get('/coches/por-propietario/{propietarioId}', [CocheController::class, 'cochesPorPropietario'])->name('coches.por-propietario');