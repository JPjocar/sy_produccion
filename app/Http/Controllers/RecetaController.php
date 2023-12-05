<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Receta;
use Illuminate\Http\Request;
use Termwind\Components\Raw;

class RecetaController extends Controller
{
    public function mostrarPorProducto(Producto $producto){
        //MOSTRAR RECETAS SOLO CUANDO ESTADO = 1
        // $recetas = $producto->getRecetas()->orderBy('estado', 'desc')->orderBy('id', 'desc')->get();
        $recetas = $producto->getRecetas()->orderBy('id', 'desc')->get();
        return view('recetas.mostrarPorProducto', compact('recetas', 'producto'));
    }

    // public function showIngredientes( Receta $receta ){
    //     $productos = $receta->productos()->get();
    //     //NO SE DEBE ENVIAR TODO EL OBJETO RECETA
    //     return view('recetas.mostrarIngredientes', compact('productos', 'receta'));
    // }

    public function enable(Receta $receta){
        Receta::where('id', '!=', $receta->id)->update(['estado'=>0]);
        $receta->estado = 1;
        $receta->save();
        return redirect()->back();
    }

    public function crear(Producto $producto){
        return view('recetas.create', compact('producto'));
    }
    
    public function almacenar(Request $request){
        $receta = new Receta();
        $receta->nombre = $request->nombre;
        $receta->id_producto = $request->id_producto;
        $receta->save();
        $producto = Producto::find($receta->id_producto);
        return redirect()->route('recetas.mostrarPorProducto', $producto);
    }

    public function crearIngrediente(Receta $receta){
        //Obtener ingredientes
        $productos = Producto::where('id_tipo_producto', 2)->get();
        return view('recetas.crearIngredientes', compact('receta', 'productos'));
    }

    public function almacenarIngrediente(Request $request){
        $id_ingrediente = $request->id_ingrediente;
        $id_receta = $request->id_receta;
        $cantidad = $request->cantidad;
        $precio = Producto::find($id_ingrediente)->precio;
        $subtotal = $cantidad * $precio;
        $receta = Receta::find($id_receta);
        $receta->productos()->attach($id_ingrediente, ['precio_producto'=>$precio, 'cantidad'=>$cantidad, 'subtotal'=>$subtotal]);
        return redirect()->route('productos.mostrarPorReceta', $receta);
    }
    

    public function destruir(Receta $receta){
        $id_producto = $receta->producto()->first()->id;
        $receta->delete();
        return redirect()->route('recetas.mostrarPorProducto', $id_producto);
    }

    public function editarIngrediente(Receta $receta, Producto $producto){
        return view('recetas.editarIngrediente', compact('receta', 'producto'));
    }

    public function actualizarIngrediente(Receta $receta, Request $request){
        $id_producto = $request->id_producto;
        $receta->productos()->updateExistingPivot($id_producto, ['cantidad' => $request->cantidad]);
        return redirect()->route('productos.mostrarPorReceta', $receta);
    }

}
