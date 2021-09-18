<!DOCTYPE html>
<html>
<head>
    <title>Edit action</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('action') }}">View All actions</a></li>
        <li><a href="{{ URL::to('action/create') }}">Create a action</a>
    </ul>
</nav>

<h1>Edit {{ $action->name }}</h1>
  {!! Form::model($action, ['method' => 'PATCH', 'action' => ['ActionController@update',$action->id]]) !!}
   @include('action.form', ['submitButtonText' => 'Edit action'])
  {!! Form::close() !!}

</div>
</body>
</html>