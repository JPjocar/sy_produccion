<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <style>
        .hidden{
            display: none;
        }
        .enlace{
            text-decoration: none;
            display: inline-block;
            background-color: royalblue;
            color: white;
            padding: 5px;
        }
    </style>
</head>

<body>
    @yield('body')
    <br>
    <a class="enlace" href="{{route('presentaciones.index')}}">PRESENTACIONES</a>
    <a class="enlace" href="{{route('marcas.index')}}">MARCAS</a>
    <a class="enlace" href="{{route('tipoProducto.index')}}">PRODUCTOS</a>
</body>
</html>