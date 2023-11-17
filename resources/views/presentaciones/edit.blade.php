@extends('plantillas.plantilla')
@section('title', 'Editar Presentacion')
@section('body')
    <h1>Edita una presentacion</h1>

    <form action="{{route('presentaciones.update', $presentacion)}}" method="POST">
        @csrf
        @method('put')
        <div>
            <label for="descripcion">Descripcion: </label>
            <input type="text" name="descripcion" id="descripcion" value="{{old('descripcion', $presentacion->descripcion)}}">
        </div>
        @error('descripcion')
            {{$message}}
        @enderror
        <div>
            <label for="cantidad">Cantidad: </label>
            <input type="text" name="cantidad" id="cantidad" value="{{old('cantidad', $presentacion->cantidad)}}">
        </div>
        @error('cantidad')
            {{$message}}
        @enderror
        <div>
            <button type="submit">Editar Presentacion</button>
        </div>
    </form>

@endsection