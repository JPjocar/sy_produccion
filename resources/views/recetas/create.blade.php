@extends('plantillas.plantilla')
@section('title', 'Crear Receta')

@section('body')
    <h1>CREA UNA RECETA PARA <strong style="color: royalblue">{{ Str::upper($producto->nombre) }}</strong></h1>
    <form method="POST" action="{{Route('recetas.almacenar')}}">
        @csrf
        <div>
            <label>Nombre: </label>
            <input type="text" name="nombre" required>
        </div><br>
        <input type="hidden" name="id_producto" value="{{$producto->id}}">
        <button type="submit">CREAR RECETA</button>
    </form>
@endsection