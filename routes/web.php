<?php

use App\Http\Controllers\MarcaController;
use App\Http\Controllers\PresentacionController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('marcas', [MarcaController::class, 'index'])->name('marcas.index');
Route::get('marcas/create', [MarcaController::class, 'create'])->name('marcas.create');
Route::post('marcas', [MarcaController::class, 'store'])->name('marcas.store');
Route::get('marcas/{marca}/edit', [MarcaController::class, 'edit'])->name('marcas.edit');
Route::put('marcas/{marca}', [MarcaController::class, 'update'])->name('marcas.update');
Route::delete('marcas/{marca}', [MarcaController::class, 'destroy'])->name('marcas.destroy');

Route::get('presentaciones', [PresentacionController::class, 'index'])->name('presentaciones.index');
Route::get('presentaciones/create', [PresentacionController::class, 'create'])->name('presentaciones.create');
Route::post('presentaciones', [PresentacionController::class, 'store'])->name('presentaciones.store');
Route::get('presentaciones/{presentacion}/edit', [PresentacionController::class, 'edit'])->name('presentaciones.edit');
Route::put('presentaciones/{presentacion}', [PresentacionController::class, 'update'])->name('presentaciones.update');
Route::delete('presentaciones/{presentacion}', [PresentacionController::class, 'destroy'])->name('presentaciones.destroy');


