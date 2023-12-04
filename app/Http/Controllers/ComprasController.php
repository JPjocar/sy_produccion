<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;

class ComprasController extends Controller
{
    public function indice(){
        $compras = Compra::orderBy('id', 'desc')->get();
        return view('compras.indice', compact('compras'));
    }
    public function crear(){
        return view('compras.create');
    }
    public function almacenar(){

    }
}
//Enviar un array de registros a una tabla
//Generar buscador para agregar datos de claves foraneas