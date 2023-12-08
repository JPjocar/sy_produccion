<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComprasController extends Controller
{
    public function indice(){
        //Aqui se debe paginar
        $compras = Compra::select('id', 'codigo_compra', 'fecha_compra', 'precio_total', 'estado', 'created_at')->orderBy('created_at', 'desc')->get();
        return view('compras.indice', compact('compras'));
    }

    public function crear(){
        $compra = new Compra();
        $compra->estado = "En Proceso";
        $compra->save();
        return redirect()->route('compras.asignarProductos', $compra);
    }

    public function asignarProductos($id_compra){
        $compra = Compra::select('id', 'codigo_compra', 'precio_total', 'estado')->find($id_compra);
        $productos = $compra->productos()->select('id', 'nombre')->get();
        return view('compras.asignarProductos', compact('compra', 'productos'));
    }

    public function eliminarProducto($id_compra, $id_producto){
        $compra = Compra::select('id', 'precio_total')->find($id_compra);
        $producto = $compra->productos()->select('subtotal')->find($id_producto);
        $subtotal = $producto->subtotal;
        DB::beginTransaction();
        try {
            $compra->productos()->detach($id_producto);
            $compra->precio_total -= $subtotal;
            $compra->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
        
        return redirect()->route('compras.asignarProductos', $compra);
    }

    public function almacenarProducto( $id_compra, Request $request ){
        $compra = Compra::select('id', 'precio_total')->find($id_compra);

        $id_producto = $request->id_producto;
        $cantidad = $request->cantidad;
        $precio = $request->precio; 
        $subtotal = $precio * $cantidad;

        DB::beginTransaction();
        try {
            $compra->productos()->attach($id_producto, ['precio'=>$precio, 'cantidad'=>$cantidad, 'subtotal'=>$subtotal]);
            $compra->precio_total += $subtotal;
            $compra->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
        
        return redirect()->route('compras.asignarProductos', $compra);
    }

    //Al completar la compra los precios de los productos se actualizan
    //Cada producto en la lista de compra se debe buscar y sumarse sus precios, sus cantidades, y luego dividir, promedio
    public function completarCompra($id_compra, Request $request){
        $compra = Compra::select('id', 'codigo_compra', 'fecha_compra', 'estado')->find($id_compra);
        $productos = $compra->productos()->select('id')->get();
        $num_productos = count($productos);
        if($num_productos<=0){
            return redirect()->route('compras.asignarProductos', $compra);
        }
        DB::beginTransaction();
        try{
            DB::select("CALL actualizar_precio_compra(\" . $compra->id . \")");
            $compra->codigo_compra = $request->codigo_compra;
            $compra->fecha_compra = $request->fecha_compra;
            $compra->estado = "Completado";
            $compra->save();
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
        }

        //Actualizar precios de cada producto
        return redirect()->route('compras.asignarProductos', $compra);
    }

    public function eliminar(Compra $compra){
        $compra->delete();
        return redirect()->route('compras.indice');
    }
}
//Enviar un array de registros a una tabla
//Generar buscador para agregar datos de claves foraneas