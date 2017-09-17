<div class='form-group'>
 {!! Form::label('name', 'Name:') !!}
 {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
 {!! Form::label('body', 'Body:') !!}
 {!! Form::text('body', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
 {!! Form::label('planetship_cost', 'Planetship Cost:') !!}
 {!! Form::text('planetship_cost', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
 {!! Form::label('starship_cost', 'Starship Cost:') !!}
 {!! Form::text('starship_cost', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
 {!! Form::label('travel_time', 'Travel Time:') !!}
 {!! Form::text('travel_time', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
 {!! Form::label('colonize_time', 'Colonize Time:') !!}
 {!! Form::text('colonize_time', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
 {!! Form::label('artist_url', 'Artist URL:') !!}
 {!! Form::text('artist_url', null, ['class' => 'form-control']) !!}
</div>

<div class='form-group'>
 {!! Form::submit($submitButtonText, ['class' => 'btn btn-lg btn-success form-control']) !!}
</div>