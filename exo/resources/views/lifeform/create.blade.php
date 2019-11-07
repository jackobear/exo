<!DOCTYPE html>
<html>
<head>
    <title>Create Lifeform</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('Lifeform') }}">Lifeforms</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('Lifeform') }}">View All Lifeforms</a></li>
        <li><a href="{{ URL::to('lifeform/create') }}">Create a Lifeform</a>
    </ul>
</nav>

<h1>Create Lifeform</h1>
  {!! Form::model(null, ['method' => 'POST', 'action' => ['LifeformController@store']]) !!}
   @include('lifeform.form', ['submitButtonText' => 'Create Lifeform'])
  {!! Form::close() !!}

</div>
</body>
</html>