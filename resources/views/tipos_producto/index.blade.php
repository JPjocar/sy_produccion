@extends('plantillas.plantilla')
@section('title', 'Tipos de producto')
@section('body')
    <h1>TIPOS DE PRODUCTO</h1>
    <h2><a href="{{ route('tiposProducto.crear') }}">Crear un nuevo tipo de producto</a></h2>
    <ul>
    @foreach ($tiposProducto as $tipo)
        <li>
            <a href="{{Route('productos.mostrarPorTipo', $tipo)}}">{{ Str::upper($tipo->nombre) }}</a>
            <form style="display: inline-block" method="POST" action="{{route('tiposProducto.destruir', $tipo)}}">
                @csrf
                @method('delete')
                <button type="submit">Eliminar</button>
            </form>
        </li><br>
    @endforeach
    </ul>
@endsection