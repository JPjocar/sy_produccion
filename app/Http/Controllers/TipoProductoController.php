<?php

namespace App\Http\Controllers;

use App\Models\TipoProducto;
use Illuminate\Http\Request;
use App\Http\Requests\almacenarTipoProductoRequest;

class TipoProductoController extends Controller
{
    public function index(){
        $tiposProducto = TipoProducto::select('id', 'tipo')->orderBy('id', 'desc')->get();
        return view('tipos_producto.index', compact('tiposProducto'));
    }
    public function crear(){
        return view('tipos_producto.create');
    }
    public function almacenar(almacenarTipoProductoRequest $request){
        $tipoProducto = TipoProducto::create($request->all());
        return redirect()->route('tipoProducto.index');
    }
    public function destruir(TipoProducto $tipoProducto){
        $tipoProducto->delete();
        return redirect()->route('tipoProducto.index');
    }
}
