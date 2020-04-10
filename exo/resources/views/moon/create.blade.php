<!DOCTYPE html>
<html>
<head>
    <title>Create Moon</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('moon') }}">Moon</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('moon') }}">View All Moons</a></li>
        <li><a href="{{ URL::to('moon/create') }}">Create a Moon</a>
    </ul>
</nav>

<h1>Create Moon</h1>
  {!! Form::model(null, ['method' => 'POST', 'action' => ['MoonController@store']]) !!}
   @include('moon.form', ['submitButtonText' => 'Save Moon'])
  {!! Form::close() !!}

</div>
</body>
</html>