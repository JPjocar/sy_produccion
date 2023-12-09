@extends('plantillas.plantilla')

@section('title', 'Compras')

@section('body')
    <h1>CREA TU COMPRA</h1>
    <form action="{{route('compras.almacenar')}}" method="POST">
        @csrf
        <div>
            <label>Codigo de la compra: </label>
            <input type="text" name="codigo_compra" required>
        </div>
        <div>
            <label>Fecha de la compra: </label>
            <input type="date" name="fecha_compra" required>
        </div>
        <div>
            <button  type="submit">CREAR COMPRA</button>
        </div>
    </form>

@endsection