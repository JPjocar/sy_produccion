@extends('plantillas.plantilla')
@section('title', 'Marcas')
@section('body')
    <h1>Todas las Marcas</h1>
    <h2><a href="{{route('marcas.create')}}" class="btn_crear_compra">Registrar nueva Marca</a></h2>
    <div> {{ $marcas->links() }} </div>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>FN1</th>
                <th>FN2</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($marcas as $marca)
                <tr>
                    <td>{{ $marca->nombre }}</td>
                    <td>{{ $marca->descripcion }}</td>
                    <td><a href="{{route('marcas.edit', $marca)}}">EDIT</a></td>
                    <td>
                        <form action="{{route('marcas.destroy', $marca)}}" method="POST">
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