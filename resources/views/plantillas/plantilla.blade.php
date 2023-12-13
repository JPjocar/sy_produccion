<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('estilos')
    <title>@yield('title')</title>
    <style>
        *{
            box-sizing: border-box;
            font-family: cascadia code;

        }
        .enlace{
            text-decoration: none;
            display: inline-block;
            background-color: rgb(64, 134, 64);
            color: white;
            padding: 5px;
            width: 100%;
            text-align: center;
            padding: 10px;
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

        
        .hidden{
            display: none;
        }
        .form{
            width: 200px;
            position: relative;
        } 
        ul{
            list-style: none;
            padding: 0;
            margin: 0;
            position: absolute;
        }
        ul, input{
            width: 100%;
        }
        li{
            background-color: beige;
            cursor: pointer;
        }
        li:hover{
            background-color: bisque;
        }
        .selected{
            background-color: bisque;
        }
        .nav{
            display: flex;           
            flex-grow: 1;
            border-radius: 5px;
            overflow: hidden;
        }
        .enlace:hover{
            background-color: rgb(64, 134, 64, 0.9);
        }
        body{
            background-color: rgba(0, 0, 0, 0.1)
        }

    </style>
</head>

<body>
    
    <div class="nav">
        <a class="enlace" href="#">PRODUCCION</a>  
        <a class="enlace" href="{{route('compras.indice')}}">COMPRAS</a>
        <a class="enlace" href="#">RECETAS</a>
        <a class="enlace" href="{{route('tipoProducto.index')}}">TIPOS-PRODUCTO</a>
        <a class="enlace" href="{{route('presentaciones.index')}}">PRESENTACIONES</a>
        <a class="enlace" href="{{route('marcas.index')}}">MARCAS</a>
        <a class="enlace" href="{{route('clientes.indice')}}">CLIENTES</a>  
        <a class="enlace" href="{{route('tiendas.indice')}}">TIENDAS</a>  
    </div>
    @yield('body')
    <br>
    
        
</body>
</html>