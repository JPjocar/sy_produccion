@extends('plantillas.plantilla')
@section('title', 'Registrar Compra')

@section('body')
            <h1>CODIGO DE LA COMPRA: {{ $compra->codigo_compra }}</h1>
            <h1>FECHA DE LA COMPRA: {{ $compra->fecha_compra }}</h1>
            <h2>Agrega ingredientes a la compra</h2>
        @if($compra->estado!=="Completado")   
            <form method="POST" action="{{route('compras.almacenarProducto', $compra)}}">
                @csrf
                <div>
                    <label>Producto: </label>
                    <input type="text" name="producto" id="input_search_producto" value="{{old('producto')}}" autocomplete="off" data-model="productos">
                    <ul class="hidden" id="resultsList_producto"></ul>
                    <input type="hidden" name="id_producto" value="{{old('id_producto')}}" id="id_producto_hidden">
                </div>
                @error('producto')
                    {{ $message }}
                @enderror
                @error('id_producto')
                    {{ $message }}
                @enderror
                
                <div>
                    <label>Cantidad: </label>
                    <input type="text" name="cantidad" id="cantidad" value="{{old('cantidad')}}" required>
                </div>
                @error('cantidad')
                    {{$message}}
                @enderror

                <div>
                    <label>Precio: </label>
                    <input type="text" name="precio" id="precio" value="{{old('precio')}}" required>
                </div>
                @error('precio')
                    {{$message}}
                @enderror

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
                                <form method="POST" action="{{route('compras.eliminarProducto', ['compra'=>$compra->id, 'producto'=>$producto->id])}}">
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
    <hr>
    <br>
    @if($compra->estado!=="Completado")
        <div>
            <form method="POST" action="{{route('compras.completarCompra', $compra)}}">
                @csrf
                @method('PUT')
                <div>
                    <button type="submit">COMPLETAR COMPRA</button>
                </div>
            </form>
        </div>
    @endif
    <script src="{{asset('js/busq_crear_producto_compra.js')}}" type="module"></script>
@endsection