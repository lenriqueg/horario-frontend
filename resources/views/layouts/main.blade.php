<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Horario</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    {!! Html::style('css/materialize.min.css') !!}
    @yield('style')
</head>
<body>
<nav></nav>

@yield('content')

{!! Html::script('js/jquery.min.js') !!}
{!! Html::script('js/materialize.min.js') !!}
@yield('script')
</body>
</html>