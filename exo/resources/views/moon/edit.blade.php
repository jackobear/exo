<!DOCTYPE html>
<html>
<head>
    <title>Edit Moon</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('moons') }}">Moon</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('moons') }}">View All Moons</a></li>
        <li><a href="{{ URL::to('moons/create') }}">Create a Moon</a>
    </ul>
</nav>

<h1>Edit {{ $moon->name }}</h1>
  {!! Form::model($moon, ['method' => 'PATCH', 'action' => ['MoonController@update',$moon->id]]) !!}
   @include('moon.form', ['submitButtonText' => 'Save Moon'])
  {!! Form::close() !!}

</div>
</body>
</html>