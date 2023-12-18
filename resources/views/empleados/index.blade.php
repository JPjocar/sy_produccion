@extends('plantillas.plantilla')

@section('title', 'Indice Empleados')

@section('body')
    <h1>EMPLEADOS</h1>
    <h2><a href="{{ route('empleados.create') }}">Crear nuevo Empleado</a></h2>
    <table>
        <thead>
            <th>DNI</th>
            <th>Nombres</th>
            <th>Ape Paterno</th>
            <th>Telefono</th>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
                <td> {{ $empleado->dni }} </td>
                <td> {{ $empleado->nombres }} </td>
                <td> {{ $empleado->ape_paterno }} </td>
                <td> {{ $empleado->telefono }} </td>
            @endforeach
        </tbody>
    </table>
@endsection
