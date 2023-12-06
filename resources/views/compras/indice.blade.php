@extends('plantillas.plantilla')

@section('title', 'Compras')

@section('body')
    <h1>Todas las compras</h1>
    <h2><a href="{{route('compras.crear')}}">Crear una nueva compra</a></h2>
    <table >
        <thead>
            <tr>
                <th>Creado el:</th>
                <th>Codigo Compra</th>
                <th>Fecha compra</th>
                <th>Precio Total</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($compras as $compra)
                <tr>
                    <td><a href="{{route('compras.asignarProductos', $compra)}}">{{ $compra->created_at }}</a></td>
                    <td>{{ $compra->codigo_compra }}</td>
                    <td>{{ $compra->fecha_compra }}</td> 
                    <td>{{ $compra->total }}</td> 
                    <td>{{ $compra->estado }}</td>
                </tr>            
            @endforeach
        </tbody>
    </table> 
@endsection