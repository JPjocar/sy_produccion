<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Receta;
use App\Models\TipoProducto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function mostrarPorTipo( TipoProducto $tipoProducto ){
        $productos = $tipoProducto->productos()->orderBy('id', 'desc')->paginate(10);
        return view('productos.mostrarPorTipo', compact('tipoProducto', 'productos'));
    }

    public function mostrarPorReceta( Receta $receta ){
        $productos = $receta->productos()->get();
        $product = $receta->producto()->first();
        return view('productos.mostrarPorReceta', compact('receta', 'productos', 'product'));
    }

    public function crearPorTipo( $tipoProducto ){
        $tipoProducto = TipoProducto::select('id', 'nombre')->find($tipoProducto);
        return view('productos.create', compact('tipoProducto'));
    }

    public function almacenar( Request $request ){
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->stock = $request->stock;
        $producto->estado = 1;
        $producto->precio = $request->precio;
        $producto->id_marca = $request->id_marca;
        $producto->id_presentacion = $request->id_presentacion;
        $producto->id_tipo_producto = $request->tipoProducto;
        $producto->save();
        return redirect()->route('productos.mostrarPorTipo', $request->tipoProducto);
    }

    public function editar( Producto $producto ){
        return view('productos.edit', compact('producto'));
    }
    
    public function actualizar( Producto $producto, Request $request ){
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->stock = $request->stock;
        $producto->precio = $request->precio;
        $producto->save();
        return redirect()->route('productos.mostrarPorTipo', $producto->id_tipo_producto);
    }

    public function destruir( Producto $producto ){
        $id_tipo_producto = $producto->id_tipo_producto;
        $producto->delete();
        return redirect()->route('productos.mostrarPorTipo', $id_tipo_producto);
    }

    public function filtrar(Request $request){
        $word = $request->input('word');
        $productos = Producto::select('id', 'nombre')->where("nombre", "LIKE", "%$word%")->orderBy('id', 'desc')->take(15)->get();
        return json_encode($productos);
    }

}
