<!DOCTYPE html>
<html>
<head>
    <title>Create asteroid</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('asteroid') }}">asteroids</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('asteroid') }}">View All asteroids</a></li>
        <li><a href="{{ URL::to('asteroid/create') }}">Create an asteroid</a>
    </ul>
</nav>

<h1>Create Asteroid</h1>
  {!! Form::model(null, ['method' => 'POST', 'action' => ['AsteroidController@store']]) !!}
   @include('asteroid.form', ['submitButtonText' => 'Create Asteroid'])
  {!! Form::close() !!}

</div>
</body>
</html>