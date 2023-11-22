<?php

namespace App\Http\Controllers;

use App\Models\TipoProducto;
use Illuminate\Http\Request;

class TipoProductoController extends Controller
{
    public function index(){
        $tiposProducto = TipoProducto::select('id', 'nombre')->get();
        return view('tipos_producto.index', compact('tiposProducto'));
    }
}
