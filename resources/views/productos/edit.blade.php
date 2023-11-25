@extends('plantillas.plantilla')
@section('title', "Editar $producto->nombre")
@section('body')
    <h1>EDITANDO: {{ $producto->nombre }}</h1>

    <form action="{{Route('productos.actualizar', $producto->id)}}" method="POST">
        @csrf
        @method('put')
        <div>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" value="{{old('nombre', $producto->nombre)}}">
        </div>
        @error('nombre')
            {{$message}}
        @enderror
        <div>
            <label for="descripcion">Descripcion: </label>
            <input type="text" name="descripcion" id="descripcion" value="{{old('descripcion', $producto->descripcion)}}">
        </div>
        @error('descripcion')
            {{$message}}
        @enderror
        <div>
            <label for="stock">Stock: </label>
            <input type="text" name="stock" id="stock" value="{{old('stock', $producto->stock)}}">
        </div>
        @error('stock')
            {{$message}}
        @enderror
        <div>
            <label for="precio">Precio: </label>
            <input type="text" name="precio" id="precio" value="{{old('precio', $producto->precio)}}">
        </div>
        @error('precio')
            {{$message}}
        @enderror
        <div>
            <button type="submit">EDITAR</button>
        </div>
    </form>

@endsection