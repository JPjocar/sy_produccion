@extends('plantillas.tabla_productos')

@section('titulo', 'MOSTRANDO PRODUCTOS')

@section('thead')
    <th>Acciones</th>
@endsection

@section('tbody')
    @foreach ($productos as $producto)
    <tr>
        <td><a href="{{route('productos.show', $producto->id)}}">{{ $producto->nombre }}</a></td>
        <td>{{ $producto->descripcion }}</td>
        <td>{{ $producto->stock }}</td>
        <td>{{ $producto->estado }}</td>
        <td>{{ $producto->precio }}</td>
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
    <div>{{ $productos->links() }}</div>
@endsection