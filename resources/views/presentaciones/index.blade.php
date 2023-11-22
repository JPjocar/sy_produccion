@extends('plantillas.plantilla')
@section('title', 'Presentaciones')
@section('body')
    <h1>PRESENTACIONES</h1>
    <a href="{{route('presentaciones.create')}}">CREAR UNA PRESENTACION</a>


    <table border="1">
        <thead>
            <tr>
                <th>Descripcion</th>
                <th>Cantidad</th>
                <th>FN1</th>
                <th>FN2</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($presentaciones as $presentacion)
                <tr>
                    <td>{{ $presentacion->descripcion }}</td>
                    <td>{{ $presentacion->cantidad }}</td>
                    <td><a href="{{route('presentaciones.edit', $presentacion)}}">EDIT</a></td>
                    <td>
                        <form action="{{route('presentaciones.destroy', $presentacion)}}" method="POST">
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