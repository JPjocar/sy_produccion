<!DOCTYPE html>
<html lang="es">
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
            background-color: rgb(23, 80, 23);
            color: white;
            padding: 5px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            margin-bottom: 30px
        }
        th{
            background-color: rgb(65, 105, 225);
            color: white
        }

th, td {
  text-align: left;
  padding: 8px;
  border: 1px solid black;
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