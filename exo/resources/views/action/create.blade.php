<!DOCTYPE html>
<html>
<head>
    <title>Create Action</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('action') }}">Actions</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('action') }}">View All actions</a></li>
        <li><a href="{{ URL::to('action/create') }}">Create an Action</a>
    </ul>
</nav>

<h1>Create Action</h1>
  {!! Form::model(null, ['method' => 'POST', 'action' => ['ActionController@store']]) !!}
   @include('action.form', ['submitButtonText' => 'Create action'])
  {!! Form::close() !!}

</div>
</body>
</html>