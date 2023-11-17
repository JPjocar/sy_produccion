@extends('plantillas.plantilla')
@section('title', 'Crear Marca')
@section('body')
    <h1>Crea una marca</h1>

    <form action="{{route('marcas.store')}}" method="POST">
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
            <textarea name="descripcion" id="descripcion">{{old('descripcion')}}</textarea>
        </div>
        <div>
            <button type="submit">Crear Marca</button>
        </div>
    </form>

@endsection