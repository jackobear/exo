<div class='form-group'>
 {!! Form::label('name', 'Name:') !!}
 {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
 {!! Form::label('type', 'Type:') !!}
 {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
 {!! Form::label('body', 'Body:') !!}
 {!! Form::text('body', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
 {!! Form::label('satellites', 'Satellites:') !!}
 {!! Form::text('satellites', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
 {!! Form::label('artist_url', 'Artist URL:') !!}
 {!! Form::text('artist_url', null, ['class' => 'form-control']) !!}
</div>

<div class='form-group'>
 {!! Form::submit($submitButtonText, ['class' => 'btn btn-lg btn-success form-control']) !!}
</div>