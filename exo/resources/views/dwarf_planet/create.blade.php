<!DOCTYPE html>
<html>
<head>
    <title>Create Dwarf Planet</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('habitable-world') }}">Dwarf Planets</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('dwarf-planet') }}">View All Dwarf Planets</a></li>
        <li><a href="{{ URL::to('dwarf-planet/create') }}">Create an Dwarf Planet</a>
    </ul>
</nav>

<h1>Create Dwarf Planet</h1>
  {!! Form::model(null, ['method' => 'POST', 'action' => ['DwarfPlanetController@store']]) !!}
   @include('dwarf_planet.form', ['submitButtonText' => 'Create Dwarf Planet'])
  {!! Form::close() !!}

</div>
</body>
</html>