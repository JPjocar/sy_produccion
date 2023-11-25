@extends('plantillas.plantilla')
@section('title', 'Tipos de producto')
@section('body')
    <h1>TIPOS DE PRODUCTO</h1>
    <ul>
    @foreach ($tiposProducto as $tipo)
        <li><a href="{{Route('productos.mostrarPorTipo', $tipo)}}">{{ Str::upper($tipo->nombre) }}</a></li>
    @endforeach
    </ul>
@endsection