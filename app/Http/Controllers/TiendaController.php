<?php

namespace App\Http\Controllers;

use App\Http\Requests\actualizarTiendaRequest;
use App\Http\Requests\almacenarTiendaRequest;
use App\Models\Tienda;
use Illuminate\Http\Request;

class TiendaController extends Controller
{
    public function indice(){
        $tiendas = Tienda::select('id', 'nombre', 'direccion', 'telefono')->orderBy('id', 'desc')->paginate(15);
        return view('tiendas.indice', compact('tiendas'));
    }
    public function crear(){
        return view('tiendas.crear');
    }
    public function almacenar(almacenarTiendaRequest $request){
        $tienda = new Tienda();
        $tienda->nombre = $request->nombre;
        $tienda->direccion = $request->direccion;
        $tienda->telefono = $request->telefono;
        $tienda->save();
        return redirect()->route('tiendas.indice');
    }
    public function eliminar($id_tienda){
        $tienda = Tienda::find($id_tienda);
        $tienda->delete();
        return redirect()->route('tiendas.indice');
    }
    public function editar($id_tienda){
        $tienda = Tienda::select('id', 'nombre', 'direccion', 'telefono')->find($id_tienda);
        return view('tiendas.editar', compact('tienda'));
    }
    public function actualizar($id_cliente, actualizarTiendaRequest $request){
        $tienda = Tienda::select('id', 'nombre', 'direccion', 'telefono')->find($id_cliente);
        $tienda->nombre = $request->nombre;
        $tienda->direccion = $request->direccion;
        $tienda->telefono = $request->telefono;
        $tienda->save();
        return redirect()->route('tiendas.indice');
    }
}
