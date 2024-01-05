<?php

namespace App\Http\Controllers;

use App\Http\Requests\almacenarProductoRequest;
use App\Http\Requests\almacenarRequest;
use App\Models\Compra;
use App\Models\Producto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ComprasController extends Controller
{

    public function indice(){
        $compras = Compra::select('id', 'codigo_compra', 'fecha_compra', 'precio_total', 'estado', 'created_at')->orderBy('created_at', 'desc')->paginate(15);
        return view('compras.indice', compact('compras'));
    }

    public function crear(){
        return view('compras.crear');
    }

    public function almacenar(almacenarRequest $request){
        $compra = new Compra();
        $compra->estado = "En Proceso";
        $compra->codigo_compra = $request->codigo_compra;
        $compra->fecha_compra = $request->fecha_compra;
        $compra->save();
        return redirect()->route('compras.asignarProductos', $compra);
    }

    public function asignarProductos($id_compra){
        $compra = Compra::select('id', 'codigo_compra', 'precio_total', 'estado', 'fecha_compra')->find($id_compra);
        $productos = $compra->productos()->select('id', 'nombre')->orderBy('pivot_created_at', 'desc')->paginate(20);
        return view('compras.asignarProductos', compact('compra', 'productos'));
    }

    public function eliminarProducto($id_compra, $id_producto){   
        DB::beginTransaction();
        try {
            $compra = Compra::select('id', 'precio_total')->findOrFail($id_compra);
            $producto = $compra->productos()->select('subtotal')->findOrFail($id_producto);
            $subtotal = $producto->subtotal;
            $compra->productos()->detach($id_producto);
            $compra->precio_total -= $subtotal;
            $compra->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return redirect()->route('compras.asignarProductos', $compra);
    }

    public function almacenarProducto( $id_compra, almacenarProductoRequest $request ){
        DB::beginTransaction();
        try {
            $compra = Compra::select('id', 'precio_total')->findOrFail($id_compra);
            $producto = Producto::select('id')->findOrFail($request->id_producto); 
            $cantidad = $request->cantidad;
            $precio = $request->precio; 
            $subtotal = $precio * $cantidad;
            $compra->productos()->attach($producto, ['precio'=>$precio, 'cantidad'=>$cantidad, 'subtotal'=>$subtotal, 'pivot_created_at'=>now()]);
            $compra->precio_total += $subtotal;
            $compra->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
        
        return redirect()->route('compras.asignarProductos', $compra);
    }

    public function completarCompra($id_compra){
        $productosInactivos = $this->verificarEstadoProductos($id_compra);
        if(count($productosInactivos) >= 1){
            foreach($productosInactivos as $productoInactivo){
                $this->eliminarProducto($id_compra, $productoInactivo->id);
            }
            $array = $productosInactivos->pluck('nombre');
            return redirect()->back()->with('error', $array);
        }
        DB::beginTransaction();
        try{
            $compra = Compra::select('id', 'codigo_compra', 'fecha_compra', 'estado')->findOrFail($id_compra);
            $productos = $compra->productos()->select('id')->get();
            if(count($productos) <= 0){
                return redirect()->route('compras.asignarProductos', $compra);
            }
            DB::select('call actualizar_precio_compra(:id_compra)', ['id_compra' => $compra->id]);
            $compra->estado = "Completado";
            $compra->save();
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
        }
        return redirect()->route('compras.asignarProductos', $compra);
    }

    public function verificarEstadoProductos($id_compra){
        $productosInactivos = Producto::select('productos.id', 'productos.nombre')
                                ->join('detalles_compra', 'productos.id', '=', 'detalles_compra.id_producto')
                                ->where('detalles_compra.id_compra', '=', $id_compra)
                                ->where('productos.estado', '=', 0)
                                ->get();
        return $productosInactivos;
    }

    public function eliminar($id_compra){
        DB::beginTransaction();
        try{
            $compra = Compra::findOrFail($id_compra);
            DB::select('call delete_compra(:id_compra)', ['id_compra' => $compra->id]);
            $compra->delete();
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
        }
        return redirect()->route('compras.indice');
    }
    
}
