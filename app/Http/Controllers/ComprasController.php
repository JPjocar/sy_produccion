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
        $compra = new Compra();
        $compra->estado = "En Proceso";
        $compra->save();
        return redirect()->route('compras.asignarProductos', $compra);
    }

    public function asignarProductos(Compra $compra){
        return view('compras.create', compact('compra'));
    }

    public function eliminarProductos(Compra $compra, Request $request){
        $compra->productos()->detach($request->id_producto);
        return redirect()->route('compras.asignarProductos', $compra);
    }

    public function almacenar( Compra $compra, Request $request){
        $id_producto = $request->id_producto;
        $precio = $request->precio;
        $cantidad = $request->cantidad;
        $subtotal = $precio * $cantidad;
        $compra->productos()->attach($id_producto, ['precio'=>$precio, 'cantidad'=>$cantidad, 'subtotal'=>$subtotal]);
        return redirect()->route('compras.asignarProductos', $compra);
    }
}
//Enviar un array de registros a una tabla
//Generar buscador para agregar datos de claves foraneas