@extends('plantillas.plantilla')
@section('title', 'Tipos de producto')
@section('body')
    <h1>TIPOS DE PRODUCTO</h1>
    <h2><a href="{{ route('tiposProducto.crear') }}">Crear un nuevo tipo de producto</a></h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tiposProducto as $tipo)
                <tr>
                    <td>{{ $tipo->id }}</td>
                    <td><a href="{{Route('productos.mostrarPorTipo', $tipo)}}">{{ $tipo->tipo }}</a></td>
                    <td>
                        <form method="POST" action="{{route('tiposProducto.destruir', $tipo)}}">
                            @csrf
                            @method('delete')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection