<!DOCTYPE html>
<html>
<head>
    <title>Edit star</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('stars') }}">stars</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('stars') }}">View All stars</a></li>
        <li><a href="{{ URL::to('stars/create') }}">Create a star</a>
    </ul>
</nav>

<h1>Edit {{ $star->name }}</h1>
  {!! Form::model($star, ['method' => 'PATCH', 'action' => ['StarController@update',$star->id]]) !!}
   @include('star.form', ['submitButtonText' => 'Save star'])
  {!! Form::close() !!}

</div>
</body>
</html>