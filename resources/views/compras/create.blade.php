@extends('plantillas.plantilla')
@section('title', 'Registrar Compra')

@section('body')

    <h1>Guardar una compra</h1>
    <form method="POST" action="">
        <div>
            <label>Codigo de la compra: </label>
            <input type="text" name="codigo_compra" value="{{old('codigo_compra')}}">
        </div>
        <div>
            <label>Fecha de la compra: </label>
            <input type="text" name="fecha_compra" value="{{old('fecha_compra')}}">
        </div>
        <div>
            
        </div>

        <button type="submit">Enviar</button>
    </form>

@endsection