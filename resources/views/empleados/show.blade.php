@extends('plantillas.plantilla')
@section('title', 'Show Empleado')
    
@section('body')
    <h1>Datos Empleado: </h1>
    @dump($empleado->nombre)
@endsection