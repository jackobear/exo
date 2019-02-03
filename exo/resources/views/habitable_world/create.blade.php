<!DOCTYPE html>
<html>
<head>
    <title>Create Habitable World</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('habitable-world') }}">Habitable Worlds</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('habitable-world') }}">View All Habitable Worlds</a></li>
        <li><a href="{{ URL::to('habitable-world/create') }}">Create a Habitable World</a>
    </ul>
</nav>

<h1>Create Habitable World</h1>
  {!! Form::model(null, ['method' => 'POST', 'action' => ['HabitableWorldController@store']]) !!}
   @include('habitable_world.form', ['submitButtonText' => 'Create Habitable World'])
  {!! Form::close() !!}

</div>
</body>
</html>