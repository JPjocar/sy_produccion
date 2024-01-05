

@if ($tipoProducto->tipo==="producto-final")
    @include('plantillas.show_productos')
@endif

@if ($tipoProducto->tipo==="ingrediente")
    @include('plantillas.show_ingredientes')
@endif
