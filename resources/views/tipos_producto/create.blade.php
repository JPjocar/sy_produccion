@extends('plantillas.plantilla')
@section('title', 'Crear Tipo Producto')

@section('body')
    <h1>CREAR UN TIPO DE PRODUCTO</h1>
    <form method="POST" action="{{ route('tiposProducto.almacenar') }}">
        @csrf
        <div>
            <label>Nombre: </label>
            <input type="text" name="nombre" required>
        </div>
        <div>
            <button type="submit">CREAR TIPO DE PRODUCTO</button>
        </div>
    </form>
@endsection