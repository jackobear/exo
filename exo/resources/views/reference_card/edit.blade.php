<!DOCTYPE html>
<html>
<head>
    <title>Edit Reference Card</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('reference-card') }}">Reference Cards</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('reference-card') }}">View All Reference Cards</a></li>
        <li><a href="{{ URL::to('reference-card/create') }}">Create a Reference Card</a>
    </ul>
</nav>

<h1>Edit {{ $reference_card->name }}</h1>
  {!! Form::model($reference_card, ['method' => 'PATCH', 'action' => ['ReferenceCardController@update',$reference_card->id]]) !!}
   @include('reference_card.form', ['submitButtonText' => 'Save Reference Card'])
  {!! Form::close() !!}

</div>
</body>
</html>