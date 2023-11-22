<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Receta;
use Illuminate\Http\Request;

class RecetaController extends Controller
{
    public function showByProducto(Producto $producto){
        //MOSTRAR RECETAS SOLO CUANDO ESTADO = 1
        $recetas = $producto->getRecetas()->orderBy('estado', 'desc')->orderBy('id', 'desc')->get();
        return view('recetas.show', compact('recetas', 'producto'));
    }

    public function showIngredientes(Receta $receta){
        $productos = $receta->productos()->get();
        //NO SE DEBE ENVIAR TODO EL OBJETO RECETA
        return view('recetas.show_ingredientes', compact('productos', 'receta'));
    }
    
}
