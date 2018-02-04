<!DOCTYPE html>
<html>
<head>
    <title>Edit Dwarf Planet</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('dwarf-planets') }}">Dwarf Planets</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('dwarf-planet') }}">View All Dwarf Planets</a></li>
        <li><a href="{{ URL::to('dwarf-planet/create') }}">Create a Dwarf Planet</a>
    </ul>
</nav>

<h1>Edit {{ $dwarf_planet->name }}</h1>
  {!! Form::model($dwarf_planet, ['method' => 'PATCH', 'action' => ['DwarfPlanetController@update',$dwarf_planet->id]]) !!}
   @include('dwarf_planet.form', ['submitButtonText' => 'Save Dwarf Planet'])
  {!! Form::close() !!}

</div>
</body>
</html>