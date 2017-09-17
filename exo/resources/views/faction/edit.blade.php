<!DOCTYPE html>
<html>
<head>
    <title>Edit faction</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('planets') }}">Planets</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('planets') }}">View All factions</a></li>
        <li><a href="{{ URL::to('planets/create') }}">Create a faction</a>
    </ul>
</nav>

<h1>Edit {{ $faction->name }}</h1>
  {!! Form::model($faction, ['method' => 'PATCH', 'action' => ['FactionController@update',$faction->id]]) !!}
   @include('faction.form', ['submitButtonText' => 'Save faction'])
  {!! Form::close() !!}

</div>
</body>
</html>