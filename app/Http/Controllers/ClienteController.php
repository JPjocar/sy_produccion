<?php

namespace App\Http\Controllers;

use App\Http\Requests\actualizarClienteRequest;
use App\Http\Requests\almacenarClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function indice(){
        $clientes = Cliente::select('id', 'nombre', 'nro_identidad', 'telefono')->orderBy('id', 'desc')->paginate(15);
        return view('clientes.indice', compact('clientes'));
    }
    public function crear(){
        return view('clientes.crear');
    }
    public function almacenar(almacenarClienteRequest $request){
        $cliente = new Cliente();
        $cliente->nro_identidad = $request->nro_identidad;
        $cliente->nombre = $request->nombre;
        $cliente->telefono = $request->telefono;
        $cliente->save();
        return redirect()->route('clientes.indice');
    }
    public function eliminar($id_cliente){
        $cliente = Cliente::find($id_cliente);
        $cliente->delete();
        return redirect()->route('clientes.indice');
    }
    public function editar($id_cliente){
        $cliente = Cliente::select('id', 'nombre', 'nro_identidad', 'telefono')->find($id_cliente);
        return view('clientes.editar', compact('cliente'));
    }
    public function actualizar($id_cliente, actualizarClienteRequest $request){
        $cliente = Cliente::select('id', 'nombre', 'nro_identidad', 'telefono')->find($id_cliente);
        $cliente->nro_identidad = $request->nro_identidad;
        $cliente->nombre = $request->nombre;
        $cliente->telefono = $request->telefono;
        $cliente->save();
        return redirect()->route('clientes.indice');
    }
}
