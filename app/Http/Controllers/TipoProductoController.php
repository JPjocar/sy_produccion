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
    public function crear(){
        return view('tipos_producto.create');
    }
    public function almacenar(Request $request){
        $tipoProducto = new TipoProducto();
        $tipoProducto->nombre = $request->nombre;
        $tipoProducto->save();
        return redirect()->route('tipoProducto.index');
    }
    public function destruir(TipoProducto $tipoProducto){
        $tipoProducto->delete();
        return redirect()->route('tipoProducto.index');
    }
}
