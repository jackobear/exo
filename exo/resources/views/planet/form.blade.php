<div class='form-group'>
 {!! Form::label('name', 'Name:') !!}
 {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
 {!! Form::label('type', 'Type:') !!}
 {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
 {!! Form::label('escape_velocity', 'Launch Cost:') !!}
 {!! Form::text('escape_velocity', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
 {!! Form::label('body', 'Body:') !!}
 {!! Form::text('body', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
 {!! Form::label('sites', 'Sites:') !!}
 {!! Form::text('sites', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
 {!! Form::label('artist_url', 'Artist URL:') !!}
 {!! Form::text('artist_url', null, ['class' => 'form-control']) !!}
</div>

<div class='form-group'>
 {!! Form::submit($submitButtonText, ['class' => 'btn btn-lg btn-success form-control']) !!}
</div>