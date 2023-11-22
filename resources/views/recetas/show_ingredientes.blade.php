@extends('plantillas.tabla_productos')

@section('titulo', "MOSTRANDO INGREDIENTES DE LA RECETA: $receta->nombre")

@section('tbody')
    @foreach ($productos as $producto)
    <tr>
        <td>{{ $producto->nombre }}</td>
        <td>{{ $producto->descripcion }}</td>
        <td>{{ $producto->stock }}</td>
        <td>{{ $producto->estado }}</td>
        <td>{{ $producto->precio }}</td>
    </tr>
    @endforeach
@endsection