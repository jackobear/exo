<!DOCTYPE html>
<html>
<head>
    <title>Edit Habitable World</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('habitable_worlds') }}">Habitable Worlds</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('habitable_worlds') }}">View All Habitable Worlds</a></li>
        <li><a href="{{ URL::to('habitable_worlds/create') }}">Create a Habitable World</a>
    </ul>
</nav>

<h1>Edit {{ $habitable_world->name }}</h1>
  {!! Form::model($habitable_world, ['method' => 'PATCH', 'action' => ['HabitableWorldController@update',$habitable_world->id]]) !!}
   @include('habitable_world.form', ['submitButtonText' => 'Save Habitable World'])
  {!! Form::close() !!}

</div>
</body>
</html>