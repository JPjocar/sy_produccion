

@if ($tipoProducto['id']===1)
    @include('plantillas.show_productos')
@endif

@if ($tipoProducto['id']===2)
    @include('plantillas.show_ingredientes')
@endif
