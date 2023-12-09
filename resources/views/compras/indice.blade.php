@extends('plantillas.plantilla')

@section('title', 'Compras')

@section('estilos')
    <style>
        .e-completado{
            color: green
        }
        .e-en-proceso{
            color: red
        }
    </style>
@endsection

@section('body')
    <h1>Todas las compras</h1>
    <h2><a href="{{route('compras.crear')}}" class="btn_crear_compra">Crear una nueva compra</a></h2>
    <table>
        <thead>
            <tr>
                <th>Codigo Compra</th>
                <th>Creado el:</th>    
                <th>Fecha compra</th>
                <th>Costo Total</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($compras as $compra)
                <tr>
                    <td>{{ $compra->codigo_compra }}</td>
                    <td><a href="{{route('compras.asignarProductos', $compra)}}">{{ $compra->created_at }}</a></td>
                    <td>{{ $compra->fecha_compra }}</td> 
                    <td>S/{{ $compra->precio_total }}</td> 
                    <td class="e-{{Str::slug($compra->estado)}}">{{ $compra->estado }}</td>
                    <td>
                        <form method="POST" action="{{route('compras.eliminar', $compra)}}">
                            @csrf
                            @method('delete')
                            <button class="btn_eliminar_compra" type="submit">&#10060;</button>
                        </form>
                    </td>
                </tr>            
            @endforeach
        </tbody>
    </table> 
    <script src="./js/confirm_compras_indice.js" type="module"></script>
@endsection