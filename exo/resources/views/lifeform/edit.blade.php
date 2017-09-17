<!DOCTYPE html>
<html>
<head>
    <title>Edit lifeform</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('lifeforms') }}">lifeforms</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('lifeforms') }}">View All lifeforms</a></li>
        <li><a href="{{ URL::to('lifeforms/create') }}">Create a lifeform</a>
    </ul>
</nav>

<h1>Edit {{ $lifeform->name }}</h1>
  {!! Form::model($lifeform, ['method' => 'PATCH', 'action' => ['LifeformController@update',$lifeform->id]]) !!}
   @include('lifeform.form', ['submitButtonText' => 'Save lifeform'])
  {!! Form::close() !!}

</div>
</body>
</html>