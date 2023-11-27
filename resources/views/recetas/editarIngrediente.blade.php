@extends('plantillas.plantilla')
@section('title', 'Editar Ingrediente')

@section('body')
    <h1>Editar *{{ $producto->nombre }}* de la receta *{{ $receta->nombre }}*</h1>
    <form action="{{route('recetas.actualizarIngrediente', $receta)}}" method="POST">
        @csrf
        @method('put')
        <label>Cantidad: </label>
        <input type="text" name="cantidad" required>
        <input type="hidden" name="id_producto" value="{{ $producto->id }}">
        <button type="submit">ACTUALIZAR INGREDIENTE</button>
    </form>
@endsection