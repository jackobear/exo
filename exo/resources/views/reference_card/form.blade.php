<div class='form-group'>
 {!! Form::label('name', 'Name:') !!}
 {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
 {!! Form::label('type', 'Type:') !!}
 {!! Form::select('type', ['jumbo' => 'jumbo', 'poker' => 'poker', 'small-chit' => 'small-chit', 'medium-chit' => 'medium-chit'], ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
 {!! Form::label('quantity', 'Quantity:') !!}
 {!! Form::text('quantity', null, ['class' => 'form-control']) !!}
</div>

<div class='form-group'>
 {!! Form::submit($submitButtonText, ['class' => 'btn btn-lg btn-success form-control']) !!}
</div>