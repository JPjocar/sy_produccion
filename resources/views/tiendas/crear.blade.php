@extends('plantillas.plantilla')
@section('title', 'Crear Tienda')
@section('body')
    <h1>Crea una Tienda</h1>

    <form action="{{route('tiendas.almacenar')}}" method="POST">
        @csrf
        <div>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}" required>
        </div>
        @error('nombre')
            {{$message}}
        @enderror
        <div>
            <label for="direccion">Direccion: </label>
            <input type="text" name="direccion" id="direccion" value="{{old('direccion')}}" required>
        </div>
        @error('direccion')
            {{ $message }}
        @enderror
        <div>
            <label for="telefono">Telefono: </label>
            <input type="text" name="telefono" id="telefono" value="{{old('telefono')}}" required>
        </div>
        @error('telefono')
            {{$message}}
        @enderror
        <br>
        <div>
            <button type="submit">Guardar Tienda</button>
        </div>
    </form>

@endsection