<!DOCTYPE html>
<html>
<head>
    <title>Edit action</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('actions') }}">actions</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('actions') }}">View All actions</a></li>
        <li><a href="{{ URL::to('actions/create') }}">Create a action</a>
    </ul>
</nav>

<h1>Edit {{ $action->name }}</h1>
  {!! Form::model($action, ['method' => 'PATCH', 'action' => ['ActionController@update',$action->id]]) !!}
   @include('action.form', ['submitButtonText' => 'Edit action'])
  {!! Form::close() !!}

</div>
</body>
</html>