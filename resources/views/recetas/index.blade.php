@extends('plantillas.plantilla')

@section('title', 'Compras')

@section('body')
    <h1>Mostrando las recetas</h1>
    <h2><a href="#">Crear una receta</a></h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Estado</th>
                <th>Precio</th>
                <th>Producto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recetas as $receta)
                <tr>
                    <td>{{$receta->nombre}}</td>
                    <td>{{$receta->descripcion}}</td>
                    <td>{{$receta->estado}}</td>
                    <td>{{$receta->precio}}</td>
                    <td><a href="#">{{$receta->producto->nombre}}</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection