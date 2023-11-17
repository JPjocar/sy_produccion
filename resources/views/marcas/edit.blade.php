@extends('plantillas.plantilla')
@section('title', 'Editar Marca')
@section('body')
<h1>Editar la marca</h1>
<form action="{{route('marcas.update', $marca)}}" method="POST">
    @csrf
    @method('put')
    <div>
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" value="{{old('nombre', $marca->nombre)}}">
    </div>
    @error('nombre')
        {{$message}}   
    @enderror
    <div>
        <label for="descripcion">Descripcion: </label>
        <textarea name="descripcion" id="descripcion">{{old('descripcion', $marca->descripcion)}}</textarea>
    </div>
    <div>
        <button type="submit">Crear Marca</button>
    </div>
</form>
@endsection