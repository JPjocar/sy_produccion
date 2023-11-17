<?php

namespace App\Http\Controllers;

use App\Http\Requests\PresentacionStore;
use App\Models\Presentacion;
use Illuminate\Http\Request;

class PresentacionController extends Controller
{
    public function index(){
        $presentaciones = Presentacion::select('id', 'descripcion', 'cantidad')->orderBy('id', 'desc')->get();
        return view('presentaciones.index', compact('presentaciones'));
    }

    public function create(){
        return view('presentaciones.create');
    }

    public function edit(Presentacion  $presentacion){
        return view('presentaciones.edit', compact('presentacion'));
    }

    public function store(PresentacionStore $request){
        $presentacion = new Presentacion();
        $presentacion->descripcion = $request->descripcion;
        $presentacion->cantidad = $request->cantidad;
        $presentacion->save();
        return redirect()->route('presentaciones.index');
    }

    public function update(Presentacion $presentacion, Request $request){
        $request->validate([
            'descripcion' => 'required|min:1',
            'cantidad' => 'numeric:min:1'
        ]);
        $presentacion->descripcion = $request->descripcion;
        $presentacion->cantidad = $request->cantidad;
        $presentacion->save();
        return redirect()->route('presentaciones.index');
    }

    public function destroy(Presentacion $presentacion){
        $presentacion->delete();
        return redirect()->route('presentaciones.index');
    }
}
