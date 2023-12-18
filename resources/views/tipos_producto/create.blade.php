@extends('plantillas.plantilla')
@section('title', 'Crear Tipo Producto')

@section('body')
    <h1>CREAR UN TIPO DE PRODUCTO</h1>
    <form method="POST" action="{{ route('tiposProducto.almacenar') }}" autocomplete="off"> 
        @csrf
        <div>
            <label>Tipo: </label>
            <input type="text" name="tipo" value="{{old('tipo')}}" required>
        </div>
        @error('tipo')
            {{ $message }}
        @enderror
        <br>
        <div>
            <button type="submit">CREAR TIPO DE PRODUCTO</button>
        </div>
    </form>
@endsection