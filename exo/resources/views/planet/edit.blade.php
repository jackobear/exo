<!DOCTYPE html>
<html>
<head>
    <title>Edit Planet</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('planets') }}">Planets</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('planets') }}">View All Planets</a></li>
        <li><a href="{{ URL::to('planets/create') }}">Create a Planet</a>
    </ul>
</nav>

<h1>Edit {{ $planet->name }}</h1>
  {!! Form::model($planet, ['method' => 'PATCH', 'action' => ['PlanetController@update',$planet->id]]) !!}
   @include('planet.form', ['submitButtonText' => 'Save Planet'])
  {!! Form::close() !!}

</div>
</body>
</html>