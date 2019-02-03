<!DOCTYPE html>
<html>
<head>
    <title>Create Star</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('star') }}">Stars</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('star') }}">View All stars</a></li>
        <li><a href="{{ URL::to('star/create') }}">Create a star</a>
    </ul>
</nav>

<h1>Create Star</h1>
  {!! Form::model(null, ['method' => 'POST', 'action' => ['StarController@store']]) !!}
   @include('star.form', ['submitButtonText' => 'Create star'])
  {!! Form::close() !!}

</div>
</body>
</html>