@extends('plantillas.plantilla')
@section('title', "Crear $tipoProducto->nombre")
@section('body')
    <h1>Crea un {{ $tipoProducto->nombre }}</h1>

    <form action="{{ route('productos.almacenar') }}" method="POST">
        @csrf
        <div>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}">
        </div>
        @error('nombre')
            {{$message}}
        @enderror
        <div>
            <label for="descripcion">Descripcion: </label>
            <input type="text" name="descripcion" id="descripcion" value="{{old('descripcion')}}">
        </div>
        @error('descripcion')
            {{$message}}
        @enderror
        <div>
            <label for="stock">Stock: </label>
            <input type="text" name="stock" id="stock" value="{{old('stock')}}">
        </div>
        @error('stock')
            {{$message}}
        @enderror
        <div>
            <label for="precio">Precio: </label>
            <input type="text" name="precio" id="precio" value="{{old('precio')}}">
        </div>
        @error('precio')
            {{$message}}
        @enderror
        <input type="hidden" name="tipoProducto" value="{{$tipoProducto->id}}">
        <div>
            <button type="submit">Crear {{ $tipoProducto->nombre }}</button>
        </div>
    </form>

@endsection