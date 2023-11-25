@extends('plantillas.plantilla')
@section('title', 'Agregar ingredientes a la receta')
@section('body')
<h1>RECETA: <strong style="color: red">{{ Str::upper($receta->nombre) }}</strong></h1>
<div class="formulario">
    <form action="{{Route('recetas.almacenarIngrediente')}}" method="POST">
        @csrf
        <label>ID del ingrediente: </label>
        <input type="text" name="id_ingrediente" required>
        <input type="hidden" name="id_receta" value="{{$receta->id}}">
        <label>Cantidad del ingrediente: </label>
        <input type="number" name="cantidad" required>
        <button type="submit">Guardar ingrediente en la receta</button>
    </form>
</div>
<h2>Todos los ingredientes disponibles: </h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <!-- Como son ingredientes solo se puede editar la cantidad -->
            <!-- Si tiene un ingrediente con estado cero no se puede usar la receta, la receta tiene estado cero -->
            <!-- Al editar un registro de detalle_producto se calcula otra vez el subtotal -->
            <!-- Si el producto no tiene receta, no se puede vender (mas adelante) -->
            @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>{{ $producto->precio }}</td> <!-- Este es el precio de cada ingrediente -->
                <td>{{ $producto->estado }}</td> 
            </tr>
            @endforeach
        </tbody>
    </table> 
@endsection