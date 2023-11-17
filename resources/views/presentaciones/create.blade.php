@extends('plantillas.plantilla')
@section('title', 'Crear Presentacion')
@section('body')
    <h1>Crea una presentacion</h1>

    <form action="{{route('presentaciones.store')}}" method="POST">
        @csrf
        <div>
            <label for="descripcion">Descripcion: </label>
            <input type="text" name="descripcion" id="descripcion" value="{{old('descripcion')}}">
        </div>
        @error('descripcion')
            {{$message}}
        @enderror
        <div>
            <label for="cantidad">Cantidad: </label>
            <input type="text" name="cantidad" id="cantidad" value="{{old('cantidad')}}">
        </div>
        @error('cantidad')
            {{$message}}
        @enderror
        <div>
            <button type="submit">Crear Presentacion</button>
        </div>
    </form>

@endsection