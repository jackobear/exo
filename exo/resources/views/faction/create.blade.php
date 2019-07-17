<!DOCTYPE html>
<html>
<head>
    <title>Create faction</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('faction') }}">Factions</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('faction') }}">View All faction</a></li>
        <li><a href="{{ URL::to('faction/create') }}">Create a faction</a>
    </ul>
</nav>

<h1>Create Faction</h1>
  {!! Form::model(null, ['method' => 'POST', 'action' => ['FactionController@store']]) !!}
   @include('faction.form', ['submitButtonText' => 'Create faction'])
  {!! Form::close() !!}

</div>
</body>
</html>