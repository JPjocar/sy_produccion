<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Receta;
use App\Models\TipoProducto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    public function show($id_producto){
        $producto = Producto::select('id', 'nombre', 'descripcion', 'stock', 'estado', 'precio', 'id_marca', 'id_presentacion', 'id_tipo_producto')
        ->with(['marca'=>fn($query)=>$query->select('id','nombre'), 'presentacion'=>fn($query)=>$query->select('id','descripcion'), 'tipoProducto'=>fn($query)=>$query->select('id','tipo')])
        ->find($id_producto);
        return view('productos.show', compact('producto'));
    }
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
        $tipoProducto = TipoProducto::select('id', 'tipo')->find($tipoProducto);
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

    public function filtrarIngredientes(Request $request){
        $word = $request->input('word');
        $id_ingrediente = TipoProducto::select('id')->where('tipo','=','ingrediente')->first()->id;
        $productos = Producto::select('id', 'nombre', 'id_tipo_producto')->where("nombre", "LIKE", "%$word%")->where('id_tipo_producto','=', $id_ingrediente)->orderBy('id', 'desc')->take(15)->get();
        return json_encode($productos);
    }

}
