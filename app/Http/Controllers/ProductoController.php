<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Receta;
use App\Models\TipoProducto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function showByType( TipoProducto $tipoProducto ){
        $productos = $tipoProducto->productos()->orderBy('id', 'desc')->get();
        return view('productos.show', compact('tipoProducto', 'productos'));
    }

    public function create( $tipoProducto ){
        $tipoProducto = TipoProducto::select('id', 'nombre')->find($tipoProducto);
        return view('productos.create', compact('tipoProducto'));
    }

    public function store( Request $request ){
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->stock = $request->stock;
        $producto->estado = 1;
        $producto->precio = $request->precio;
        $producto->id_marca = 1;
        $producto->id_presentacion = 2;
        $producto->id_tipo_producto = $request->tipoProducto;
        $producto->save();
        return redirect()->route('productos.show', $request->tipoProducto);
    }

    public function edit( Producto $producto ){
        return view('productos.edit', compact('producto'));
    }
    
    public function update( Producto $producto, Request $request ){
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->stock = $request->stock;
        $producto->precio = $request->precio;
        $producto->save();
        return redirect()->route('productos.show', $producto->id_tipo_producto);
    }

}
