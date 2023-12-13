@extends('plantillas.plantilla')
@section('title', 'Crear Cliente')
@section('body')
    <h1>Crea un Cliente</h1>

    <form action="{{route('clientes.almacenar')}}" method="POST">
        @csrf
        <div>
            <label for="nro_identidad">Nro Identidad: </label>
            <input type="text" name="nro_identidad" id="nro_identidad" value="{{old('nro_identidad')}}" required>
        </div>
        @error('nro_identidad')
            {{ $message }}
        @enderror
        <div>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}" required>
        </div>
        @error('nombre')
            {{$message}}
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
            <button type="submit">Guardar Cliente</button>
        </div>
    </form>

@endsection