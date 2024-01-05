@extends('plantillas.plantilla')
@section('title', $producto->nombre)
    
@section('body')
    <div class="card">
        <div>
            Nombre: {{$producto->nombre}}
        </div>
        <div>
            Descripcion: {{$producto->nombre}}
        </div>
        <div>
            Stock: {{$producto->stock}}
        </div>
        <div>
            Estado: {{$producto->estado}}
        </div>
        <div>
            Precio: {{$producto->precio}}
        </div>
        <div>
            Marca: {{$producto->marca->nombre}}
        </div>
        <div>
            Presentacion: {{$producto->presentacion->descripcion}}
        </div>
        <div>
            Tipo Producto: {{$producto->tipoProducto->tipo}}
        </div>
    </div>
    @if ($producto->tipoProducto->tipo === "producto-final")
        <div><a href="{{route('recetas.mostrarPorProducto', $producto)}}">Ver Recetas</a></div>    
    @endif
    
@endsection