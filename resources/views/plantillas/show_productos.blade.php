@extends('plantillas.tabla_productos')

@section('titulo', 'MOSTRANDO PRODUCTOS')

@section('thead')
    <th>Recetas</th>
    <th>Acciones</th>
@endsection

@section('tbody')
    @foreach ($productos as $producto)
    <tr>
        <td>{{ $producto->nombre }}</td>
        <td>{{ $producto->descripcion }}</td>
        <td>{{ $producto->stock }}</td>
        <td>{{ $producto->estado ? 'Activo':'Inactivo' }}</td>
        <td>{{ $producto->precio }}</td>
        <td><a href="{{ route('recetas.mostrarPorProducto', $producto) }}">VER RECETA</a></td>
        <td>
            <a href="{{route('productos.editar', $producto->id)}}">EDIT</a>
            <form action="{{Route('productos.destruir', $producto->id)}}" method="POST" style="display: inline">
                @csrf
                @method('delete')
                <button type="submit">DELETE</button>
            </form>
        </td>
    </tr>
    @endforeach
@endsection