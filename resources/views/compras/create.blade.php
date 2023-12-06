@extends('plantillas.plantilla')
@section('title', 'Registrar Compra')

@section('body')
    <h1>Selecciona los ingredientes de la compra</h1>
    <form method="POST" action="{{route('compras.almacenar', $compra)}}">
        @csrf
        <div>
            <label>Producto: </label>
            <input type="text" name="producto" id="input_search_producto" value="{{old('producto')}}" autocomplete="off" data-model="productos">
            <ul class="hidden" id="resultsList_producto"></ul>
            <input type="hidden" name="id_producto" value="{{old('id_producto')}}" id="id_producto_hidden">
        </div>
        @error('id_producto')
            {{ $messsage }}
        @enderror
        <div>
            <label>Cantidad: </label>
            <input type="text" name="cantidad" id="cantidad" required autocomplete="off">
        </div>
        @error('cantidad')
            {{ $messsage }}
        @enderror
        <div>
            <label>Precio: </label>
            <input type="text" name="precio" id="precio" required autocomplete="off">
        </div>
        @error('precio')
            {{ $messsage }}
        @enderror
        <br>
        <button type="submit">Agregar</button>
    </form>
        <br>
        <hr>
    <div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($compra->productos()->get() as $producto)
                    <tr>
                        <td>{{$producto->id}}</td>
                        <td>{{$producto->nombre}}</td>
                        <td>{{$producto->pivot->precio}}</td>
                        <td>{{$producto->pivot->cantidad}}</td>
                        <td>{{$producto->pivot->subtotal}}</td>
                        <td>
                            <form method="POST" action="{{route('compras.eliminarProductos', $compra)}}">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id_producto" value="{{$producto->id}}">
                                <button type="submit">&#10060;</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <div>
    <br>
    <hr>
    <br>
    <div>
        <form method="POST" action="">
            <div>
                <label>Codigo de la compra</label>
                <input type="text" name="codigo_compra" required>
            </div>
            <div>
                <label>Fecha de la compra</label>
                <input type="date" name="fecha_compra" required> 
            </div>
            <br>
            <div>
                <button type="submit">GUARDAR COMPRA</button>
            </div>
        </form>
    </div>
    <script src="{{asset('js/busq_crear_producto_compra.js')}}" type="module"></script>
@endsection