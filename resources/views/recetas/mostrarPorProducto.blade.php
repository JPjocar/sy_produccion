@extends('plantillas.plantilla')
@section('title', "Receta de $producto->nombre")
@section('body')
<h1>MOSTRANDO LAS RECETAS DE: <strong style="color: red">{{ Str::upper($producto->nombre) }}</strong></h1>
<h2><a href="{{route('recetas.crear', $producto)}}">Crear una nueva receta para este producto</a></h2>
<table border="1">
    <thead> 
        <tr>
            <th>Nombre</th>
            <th>Fecha de creacion</th>
            <th>Costo Fabricacion</th>
            <th>Estado</th>
            <th>Habilitar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $recetas as $receta )
            <tr>
                <td><a href="{{route('productos.mostrarPorReceta',  $receta)}}">{{$receta->nombre}}</a></td>
                <td>{{$receta->created_at}}</td>
                <td>{{$receta->precio}}</td>
                <td style="text-align: center">{{$receta->estado}}</td>
                <td>
                    <form action="{{route('recetas.enable', $receta)}}" method="POST">
                        @csrf
                        @method('put')
                        <button type="submit" {{ ($receta->estado == 1) ? 'Disabled': 'Enabled' }}>HABILITAR</button>
                    </form>
                </td>
                <td>
                    <form action="{{route('recetas.destruir', $receta)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit">Eliminar receta</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table> 

@endsection