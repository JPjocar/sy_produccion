@extends('plantillas.plantilla')
@section('title', 'Tabla productos')
@section('body')
<h1>@yield('titulo')</h1>
<table border="1">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Stock</th>
            <th>Estado</th>
            <th>Precio</th>
            @yield('thead')
        </tr>
    </thead>
    <tbody>
        @yield('tbody')
    </tbody>
</table> 

@endsection