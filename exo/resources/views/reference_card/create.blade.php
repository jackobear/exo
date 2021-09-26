<!DOCTYPE html>
<html>
<head>
    <title>Create Reference Card</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('habitable-world') }}">Reference Cards</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('reference-card') }}">View All Reference Cards</a></li>
        <li><a href="{{ URL::to('reference-card/create') }}">Create an Reference Card</a>
    </ul>
</nav>

<h1>Create Reference Card</h1>
  {!! Form::model(null, ['method' => 'POST', 'action' => ['ReferenceCardController@store']]) !!}
   @include('reference_card.form', ['submitButtonText' => 'Create Reference Card'])
  {!! Form::close() !!}

</div>
</body>
</html>