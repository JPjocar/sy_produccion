@extends('plantillas.plantilla')

@section('title', 'Tiendas')

@section('body')
    <h1>Todas las Tiendas</h1>
    <h2><a href="{{route('tiendas.crear')}}" class="btn_crear_compra">Registrar nueva Tienda</a></h2>
    <div>{{ $tiendas->links() }}</div>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Direccion</th>    
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>    
            @foreach ( $tiendas as $tienda )
                <tr>
                    <td>{{ $tienda->nombre }}</td>
                    <td>{{ $tienda->direccion }}</td>
                    <td>{{ $tienda->telefono }}</td> 
                    <td>
                        <a href="{{route('tiendas.editar', $tienda)}}">&#9998;</a>
                        <form method="POST" action="{{route('tiendas.eliminar', $tienda)}}">
                            @csrf
                            @method('delete')
                            <button class="btn_eliminar_cliente" type="submit">&#10060;</button>
                        </form>
                    </td>
                </tr>            
            @endforeach
        </tbody>
    </table> 
    {{-- <script src="./js/confirm_compras_indice.js" type="module"></script> --}}
@endsection