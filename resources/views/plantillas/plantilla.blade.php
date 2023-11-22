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
    </style>
</head>

<body>
    @yield('body')
    <br>
    <a href="{{route('home')}}">HOME</a>
</body>
</html>