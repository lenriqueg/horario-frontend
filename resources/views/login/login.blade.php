<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    {!! Html::style('css/materialize.min.css') !!}
</head>
<body>
@include('partials.errors')
{!! Form::open(['route' => 'login', 'method' => 'POST']) !!}
<div class="row">
    <div class="input-field col s8 offset-s2">
        {!! Form::text('email', null) !!}
        {!! Form::label('user', 'email') !!}
    </div>
</div>
<div class="row">
    <div class="input-field col s8 offset-s2">
        {!! Form::password('password') !!}
        {!! Form::label('password', 'Contraseña') !!}
    </div>
</div>
<div class="row">
    <div class="input-field col s8 offset-s2">
        <button class="btn waves-effect waves-light">
            Iniciar sesion
        </button>
    </div>
</div>
{!! Form::close() !!}

{!! Html::script('js/jquery.min.js') !!}
{!! Html::script('js/materialize.min.js') !!}
</body>
</html>