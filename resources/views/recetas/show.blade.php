@extends('plantillas.plantilla')
@section('title', "Receta de $producto->nombre")
@section('body')
<h1>RECETA DE {{ $producto->nombre }}</h1>
<table border="1">
    <thead> 
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Fecha de creacion</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $recetas as $receta )
            <tr>
                <td>{{$receta->id}}</td>
                <td>{{$receta->nombre}}</td>
                <td>{{$receta->created_at}}</td>
                <td>{{$receta->estado ? 'Habilitado' : 'Deshabilitado'}}</td>
                <td>
                    <form action="" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit">Habilitar receta</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table> 

@endsection