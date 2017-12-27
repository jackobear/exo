<!DOCTYPE html>
<html>
<head>
    <title>Create Planet</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('planet') }}">Planets</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('planet') }}">View All Planets</a></li>
        <li><a href="{{ URL::to('planet/create') }}">Create an Planet</a>
    </ul>
</nav>

<h1>Create Planet</h1>
  {!! Form::model(null, ['method' => 'POST', 'action' => ['PlanetController@store']]) !!}
   @include('planet.form', ['submitButtonText' => 'Create Planet'])
  {!! Form::close() !!}

</div>
</body>
</html>