@extends('plantillas.plantilla')

@section('title', 'Clientes')

@section('body')
    <h1>Todas Los Clientes</h1>
    <h2><a href="{{route('clientes.crear')}}" class="btn_crear_compra">Registrar nuevo cliente</a></h2>
    <div>{{ $clientes->links() }}</div>
    <table>
        <thead>
            <tr>
                <th>Nro Identidad</th>
                <th>Nombre</th>    
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>    
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nro_identidad }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->telefono }}</td> 
                    <td>
                        <a href="{{route('clientes.editar', $cliente)}}">&#9998;</a>
                        <form method="POST" action="{{route('clientes.eliminar', $cliente)}}">
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