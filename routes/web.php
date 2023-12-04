<?php

use App\Http\Controllers\ComprasController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\PresentacionController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\TipoProductoController;
use App\Models\Producto;
use App\Models\Receta;
use App\Models\TipoProducto;
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
})->name('home');

//CRUD MARCAS
Route::get('marcas', [MarcaController::class, 'index'])->name('marcas.index');
Route::get('marcas/create', [MarcaController::class, 'create'])->name('marcas.create');
Route::post('marcas', [MarcaController::class, 'store'])->name('marcas.store');
Route::get('marcas/{marca}/edit', [MarcaController::class, 'edit'])->name('marcas.edit');
Route::put('marcas/{marca}', [MarcaController::class, 'update'])->name('marcas.update');
Route::delete('marcas/{marca}', [MarcaController::class, 'destroy'])->name('marcas.destroy');
Route::post('marcas/filtrar', [MarcaController::class, 'filtrar']);

//CRUD PRESENTACIONES
Route::get('presentaciones', [PresentacionController::class, 'index'])->name('presentaciones.index');
Route::get('presentaciones/create', [PresentacionController::class, 'create'])->name('presentaciones.create');
Route::post('presentaciones', [PresentacionController::class, 'store'])->name('presentaciones.store');
Route::get('presentaciones/{presentacion}/edit', [PresentacionController::class, 'edit'])->name('presentaciones.edit');
Route::put('presentaciones/{presentacion}', [PresentacionController::class, 'update'])->name('presentaciones.update');
Route::delete('presentaciones/{presentacion}', [PresentacionController::class, 'destroy'])->name('presentaciones.destroy');

//TIPOSPRODUCTO
Route::get('tipos-producto', [TipoProductoController::class, 'index'])->name('tipoProducto.index');
Route::get('tipos-producto/crear', [TipoProductoController::class, 'crear'])->name('tiposProducto.crear');
Route::post('tipos-producto', [TipoProductoController::class, 'almacenar'])->name('tiposProducto.almacenar');
Route::delete('tipos-producto/{tipoProducto}', [TipoProductoController::class, 'destruir'])->name('tiposProducto.destruir');


//PRODUCTOS

    //Mostrar productos por tipo
    Route::get('productos/tipo/{tipoProducto}', [ProductoController::class, 'mostrarPorTipo'])->name('productos.mostrarPorTipo');
    //Mostrar productos de una receta X (EN DUDA)
    Route::get("productos/receta/{receta}", [ProductoController::class, 'mostrarPorReceta'])->name("productos.mostrarPorReceta");


    //Crear un nuevo producto segun su tipo
    Route::get('productos/create/{tipoProducto}', [ProductoController::class, 'crearPorTipo'])->name('productos.crearPorTipo');
    Route::post('productos', [ProductoController::class, 'almacenar'])->name('productos.almacenar');

    //Eliminar producto
    Route::delete('productos/{producto}', [ProductoController::class, 'destruir'])->name('productos.destruir');

    //Editar un producto (Producto o Ingrediente)
    Route::get('productos/{producto}/edit', [ProductoController::class, 'editar'])->name('productos.editar');
    Route::put('productos/{producto}', [ProductoController::class, 'actualizar'])->name('productos.actualizar');

    


//RECETAS

    //Mostrar receta por producto
    Route::get('recetas/{producto}', [RecetaController::class, 'mostrarPorProducto'])->name('recetas.mostrarPorProducto');

    //Crear una receta
    Route::get('recetas/create/{producto}', [RecetaController::class, 'crear'])->name("recetas.crear");
    Route::post('recetas', [RecetaController::class, 'almacenar'])->name('recetas.almacenar');

    //Habilitar una receta y deshabilitar todas las demas
    Route::put('recetas/{receta}/enable', [RecetaController::class, 'enable'])->name('recetas.enable');

    //Estos ingredientes se agregar a tabla intermedia (Agregar ingredientes a la receta)
    Route::get('recetas/{receta}/productos/crear', [RecetaController::class, 'crearIngrediente'])->name("recetas.crearIngrediente");
    Route::post('recetas/productos', [RecetaController::class, 'almacenarIngrediente'])->name('recetas.almacenarIngrediente');

    //Eliminar una receta
    Route::delete('recetas/{receta}', [RecetaController::class, 'destruir'])->name('recetas.destruir');

    //Editar ingrediente para una receta (tabla intermedia)
    Route::get('recetas/{receta}/ingrediente/{producto}/edit', [RecetaController::class, 'editarIngrediente'])->name('recetas.editarIngrediente');
    Route::put('recetas/{receta}/producto', [RecetaController::class, 'actualizarIngrediente'])->name('recetas.actualizarIngrediente');


//COMPRAS
    Route::get('compras', [ComprasController::class, 'indice'])->name('compras.indice');
    Route::get('compras/create', [ComprasController::class, 'crear'])->name('compras.crear');
    Route::post('compras', [ComprasController::class, 'almacenar'])->name('compras.almacenar');