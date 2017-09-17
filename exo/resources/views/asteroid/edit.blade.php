<!DOCTYPE html>
<html>
<head>
    <title>Edit asteroid</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('asteroids') }}">asteroids</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('asteroids') }}">View All asteroids</a></li>
        <li><a href="{{ URL::to('asteroids/create') }}">Create a asteroid</a>
    </ul>
</nav>

<h1>Edit {{ $asteroid->name }}</h1>
  {!! Form::model($asteroid, ['method' => 'PATCH', 'action' => ['AsteroidController@update',$asteroid->id]]) !!}
   @include('asteroid.form', ['submitButtonText' => 'Save asteroid'])
  {!! Form::close() !!}

</div>
</body>
</html>