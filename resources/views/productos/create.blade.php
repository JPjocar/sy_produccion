@extends('plantillas.plantilla')
@section('title', "Crear $tipoProducto->nombre")
@section('body')
    <h1>Crea un {{ $tipoProducto->nombre }}</h1>

    <form action="{{ route('productos.almacenar') }}" method="POST" id="form_create_product">
        @csrf
        <div>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}">
        </div>
        @error('nombre')
            {{$message}}
        @enderror
        <div>
            <label for="descripcion">Descripcion: (Opcional)</label>
            <input type="text" name="descripcion" id="descripcion" value="{{old('descripcion')}}">
        </div>
        @error('descripcion')
            {{$message}}
        @enderror
        <div>
            <label for="stock">Stock: </label>
            <input type="number" name="stock" id="stock" value="{{old('stock')}}">
        </div>
        @error('stock')
            {{$message}}
        @enderror
        <div>
            <label for="precio">Precio: </label>
            <input type="number" name="precio" id="precio" value="{{old('precio')}}">
        </div>
        @error('precio')
            {{$message}}
        @enderror
        <div>
            <label>Marca: </label>
            <input type="text" name="marca" id="input_search_marca" value="{{old('marca')}}" autocomplete="off" data-model="marcas">
            <ul class="hidden" id="resultsList_marca"></ul>
            <input type="hidden" name="id_marca" value="{{old('id_marca')}}" id="id_marca_hidden">
        </div>
        @error('id_marca')
            {{$message}}
        @enderror
        <div>
            <label>Presentacion: </label>
            <input type="text" name="presentacion" id="input_search_presentacion" value="{{old('presentacion')}}" autocomplete="off" data-model="presentaciones">
            <ul class="hidden" id="resultsList_presentacion"></ul>
            <input type="hidden" name="id_presentacion" value="{{old('id_presentacion')}}" id="id_presentacion_hidden">
        </div>
        @error('id_presentacion')
            {{$message}}
        @enderror
        <input type="hidden" name="tipoProducto" value="{{$tipoProducto->id}}">
        <br>
        <div>
            <button type="submit">Crear {{ $tipoProducto->nombre }}</button>
        </div>
    </form>
    <script src="{{asset('js/busqueda.js')}}"></script>
@endsection