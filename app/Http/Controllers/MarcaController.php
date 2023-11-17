<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use App\Http\Requests\MarcaRequest;

class MarcaController extends Controller
{
    public function index(){
        $marcas = Marca::select('id', 'nombre', 'descripcion')->orderBy('id', 'desc')->get();
        return view('marcas.index', compact('marcas'));
    }

    public function create(){
        return view('marcas.create');
    }

    public function store(MarcaRequest $request){
        $marca = new Marca();
        $marca->nombre = $request->nombre;
        $marca->descripcion = $request->descripcion;
        $marca->save();
        return redirect()->route('marcas.index');
    }

    public function edit(Marca $marca){
        return view('marcas.edit', compact('marca'));
    }

    public function update(Marca $marca, Request $request){
        $request->validate([
            'nombre' => 'required|min:2'
        ]);
        $marca->nombre = $request->nombre;
        $marca->descripcion = $request->descripcion;
        $marca->save();
        return redirect()->route('marcas.index');
    }

    public function destroy(Marca $marca){
        $marca->delete();
        return redirect()->route('marcas.index');
    }
}
