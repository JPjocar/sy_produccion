@extends('plantillas.plantilla')

@section('title', 'Compras')

@section('body')
    <h1>Todas las compras</h1>
    <table >
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Fecha</th>
                <th>Cantidad Total</th>
                <th>Precio Total</th>
                {{-- <th>Estado</th> --}}
                {{-- <th>Acciones</th> --}}
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
                    <td>{{ $producto->pivot->cantidad }}</td> 
                    <td>{{ $producto->precio }}</td> <!-- Este es el precio de cada ingrediente -->
                    <td>{{ $producto->pivot->subtotal }}</td> 
                    {{-- <td>{{ $producto->estado }}</td>  --}}
                    {{-- <td>
                        <a href="{{route('recetas.editarIngrediente', ['receta'=>$receta, 'producto'=>$producto])}}">EDIT</a>
                        <form action="" method="POST" style="display: inline">
                            @csrf
                            @method('delete')
                            <button type="submit">DELETE</button>
                        </form>
                    </td> --}}
                </tr>            
            @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td>TOTAL</td>
                    <td>{{ $receta->precio }}</td>
                </tr>
        </tbody>
    </table> 
@endsection