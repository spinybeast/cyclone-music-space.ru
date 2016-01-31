<!doctype html>
<html class="full">
<head>
    <title>Авторизация</title>
    <link rel="stylesheet" href="../../vendor/bootstrap/dist/css/bootstrap.css">
    <style>
        body {background: none;}
        .full {background: #040607 url('../../img/back.png') no-repeat top center fixed;-webkit-background-size: cover;-moz-background-size: cover;background-size: cover;-o-background-size: cover;}
    </style>
</head>
<body>
<div class="container text-center">
    <div class="col-lg-4 col-lg-offset-4">
        {{ Form::open(array('url' => 'login', 'class' => 'form-signin')) }}
        <h2 class="form-signin-heading">Авторизуйся, смертный</h2>
        <!-- if there are login errors, show them here -->
        @if (strlen($errors->first('badAuth')) || strlen($errors->first('login')) || strlen($errors->first('password')))
        <p class="alert alert-danger" role="alert">
            {{ $errors->first('badAuth') }}
            {{ $errors->first('login') }}
            {{ $errors->first('password') }}
        </p>
        @endif

        <p>
            {{ Form::label('login', 'Login') }}
            {{ Form::text('login', Input::old('login'), array('class' => 'form-control', 'required' => '', 'autofocus'
            => '', 'autocomplete' => 'false')) }}
        </p>

        <p>
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password', array('class' => 'form-control', 'required' => '', 'autocomplete' => 'false'))
            }}
        </p>

        <p>{{ Form::submit('Войти', array('class' => 'btn btn-lg btn-primary btn-block')) }}</p>
        {{ Form::close() }}
    </div>
</div>
</body>
</html>