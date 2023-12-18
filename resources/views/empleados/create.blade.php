@extends('plantillas.plantilla')
@section('title', 'Crear Empleado')

@section('body')
    <div>
        <form method="POST" action="{{route('empleados.store')}}" autocomplete="off">
            @csrf
            <div>
                <label>Dni: </label>
                <input type="text" name="dni" value="{{old('dni')}}" required>
            </div>
            @error('dni')
                {{ $message }}
            @enderror

            <div>
                <label>Nombres: </label>
                <input type="text" name="nombres" value="{{old('nombres')}}" required>
            </div>
            @error('nombres')
                {{ $message }}
            @enderror

            <div>
                <label>Apellido Paterno</label>
                <input type="text" name="ape_paterno" value="{{old('ape_paterno')}}" required>
            </div>
            @error('ape_paterno')
                {{ $message }}
            @enderror

            <div>
                <label>Apellido Materno</label>
                <input type="text" name="ape_materno" value="{{old('ape_materno')}}" required>
            </div>
            @error('ape_materno')
                {{ $message }}
            @enderror

            <div>
                <label>Fecha Nacimiento</label>
                <input type="date" name="fecha_nac" value="{{old('fecha_nac')}}" required>
            </div>
            @error('fecha_nac')
                {{ $message }}
            @enderror

            <div>
                <label>Telefono</label>
                <input type="text" name="telefono" value="{{old('telefono')}}" required>
            </div>
            @error('telefono')
                {{ $message }}
            @enderror

            <div>
                <label>Correo</label>
                <input type="email" name="correo" value="{{old('correo')}}" required>
            </div>
            @error('correo')
                {{ $message }}
            @enderror
            <br>
            <div>
                <button type="submit">Guardar</button>
            </div>
        </form>
    </div>
@endsection