@extends('plantillas.plantilla')
@section('title', 'Registrar Compra')

@section('body')
    @if ($compra->estado==="Completado")
            <h1>COMPRA GUARDADA!!</h1>
            <h1>Codigo de la compra: "{{ $compra->codigo_compra }}"</h1>
    @else
            <h1>Agrega ingredientes a la compra</h1>
            <form method="POST" action="{{route('compras.almacenarProducto', $compra)}}">
                @csrf
                <div>
                    <label>Producto: </label>
                    <input type="text" name="producto" id="input_search_producto" value="{{old('producto')}}" autocomplete="off" data-model="productos">
                    <ul class="hidden" id="resultsList_producto"></ul>
                    <input type="hidden" name="id_producto" value="{{old('id_producto')}}" id="id_producto_hidden">
                </div>
                <div>
                    <label>Cantidad: </label>
                    <input type="text" name="cantidad" id="cantidad" required autocomplete="off">
                </div>
                <div>
                    <label>Precio: </label>
                    <input type="text" name="precio" id="precio" required autocomplete="off">
                </div>
                <br>
                <button type="submit">Agregar</button>
            </form>
    @endif

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
                    @if($compra->estado!=="Completado") 
                        <th>Acciones</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                    <tr>
                        <td>{{$producto->id}}</td>
                        <td>{{$producto->nombre}}</td>
                        <td>S/{{$producto->pivot->precio}}</td>
                        <td>{{$producto->pivot->cantidad}}</td>
                        <td>S/{{$producto->pivot->subtotal}}</td>
                        @if($compra->estado!=="Completado")
                            <td>
                                <form method="POST" action="{{route('compras.eliminarProducto', ['compra'=>$compra, 'producto'=>$producto])}}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit">&#10060;</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
                    <tr>
                        <td></td><td></td><td></td>
                        <td>TOTAL</td>
                        <td>S/{{ $compra->precio_total }}</td>
                        
                    </tr>
            </tbody>
        </table>
    <div>
    <br>
    <hr>
    <br>
    <div>
        @if($compra->estado!=="Completado")
            <form method="POST" action="{{route('compras.completarCompra', $compra)}}">
                @csrf
                @method('PUT')
                <div>
                    <label>Codigo de la compra</label>
                    <input type="text" name="codigo_compra" required autocomplete="off">
                </div>
                <div>
                    <label>Fecha de la compra</label>
                    <input type="date" name="fecha_compra" required> 
                </div>
                <br>
                <div>
                    <button type="submit">COMPLETAR COMPRA</button>
                </div>
            </form>
        @endif
        
    </div>
    <script src="{{asset('js/busq_crear_producto_compra.js')}}" type="module"></script>
@endsection