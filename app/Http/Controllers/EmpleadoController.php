<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index(){
        $empleados = Empleado::select('id', 'dni', 'nombres', 'ape_paterno', 'telefono', 'correo')->paginate(15);
        return view('empleados.index', compact('empleados'));
    }
    public function create(){
        return view('empleados.create');
    }
    public function store(Request $request){
        $empleado = Empleado::create($request->all());
        return redirect()->route('empleados.show', $empleado);
    }
    public function show(Empleado $empleado){
        return view('empleados.show', compact('empleado'));
    }
    public function edit(Empleado $empleado){

    }
    public function update(Empleado $empleado, Request $request){

    }
    public function destroy(Empleado $empleado){

    }
}
