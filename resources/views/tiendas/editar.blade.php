@extends('plantillas.plantilla')
@section('title', 'Editar Tienda')
@section('body')
    <h1>Editar una Tienda</h1>

    <form action="{{route('tiendas.actualizar', $tienda->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" value="{{old('nombre', $tienda->nombre)}}" required>
        </div>
        @error('nombre')
            {{$message}}
        @enderror
        <div>
            <label for="direccion">Direccion: </label>
            <input type="text" name="direccion" id="direccion" value="{{old('direccion', $tienda->direccion)}}" required>
        </div>
        @error('direccion')
            {{ $message }}
        @enderror
        <div>
            <label for="telefono">Telefono: </label>
            <input type="text" name="telefono" id="telefono" value="{{old('telefono', $tienda->telefono)}}" required>
        </div>
        @error('telefono')
            {{$message}}
        @enderror
        <br>
        <div>
            <button type="submit">Guardar Cambios</button>
        </div>
    </form>

@endsection