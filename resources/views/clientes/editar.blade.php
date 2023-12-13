@extends('plantillas.plantilla')
@section('title', 'Editar Cliente')
@section('body')
<h1>Editar Cliente</h1>
<form action="{{route('clientes.actualizar', $cliente)}}" method="POST">
    @csrf
    @method('put')
    <div>
        <label for="nro_identidad">Nro Identidad: </label>
        <input type="text" name="nro_identidad" id="nro_identidad" value="{{old('nro_identidad', $cliente->nro_identidad)}}">
    </div>
    @error('nro_identidad')
        {{$message}}   
    @enderror
    <div>
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" value="{{old('nombre', $cliente->nombre)}}">
    </div>
    @error('nombre')
        {{$message}}   
    @enderror
    <div>
        <label for="telefono">Telefono: </label>
        <input type="text" name="telefono" id="telefono" value="{{old('telefono', $cliente->telefono)}}">
    </div>
    @error('telefono')
        {{$message}}   
    @enderror
    <br>
    <div>
        <button type="submit">Guardar Cambios</button>
    </div>
</form>
@endsection