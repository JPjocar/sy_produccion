
@extends('plantillas.plantilla')
@section('title', 'Mostrando ingredientes de la receta')
@section('body')
<h1>RECETA: <strong style="color: red">{{ Str::upper($receta->nombre) }}</strong></h1>
    <h2><a href="{{Route('recetas.agregarIngredientes', $receta)}}">Agregar un ingrediente nuevo a la receta</a></h2>
    <h2>Ingredientes de receta: </h2>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Subtotal</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- Como son ingredientes solo se puede editar la cantidad -->
            <!-- Si tiene un ingrediente con estado cero no se puede usar la receta, la receta tiene estado cero -->
            <!-- Al editar un registro de detalle_producto se calcula otra vez el subtotal -->
            <!-- Si el producto no tiene receta, no se puede vender (mas adelante) -->
            @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>{{ $producto->pivot->cantidad }}</td> 
                <td>{{ $producto->precio }}</td> <!-- Este es el precio de cada ingrediente -->
                <td>{{ $producto->pivot->subtotal }}</td> 
                <td>{{ $producto->estado }}</td> 
                <td>
                    <a href="">EDIT</a>
                    <form action="" method="POST" style="display: inline">
                        @csrf
                        @method('delete')
                        <button type="submit">DELETE</button>
                    </form>
                </td>
            </tr>
            
            @endforeach
        </tbody>
    </table> 
@endsection

