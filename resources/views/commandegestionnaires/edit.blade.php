@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{{ Form::model($commandegestionnaire, array('route' => array('commandegestionnaires.update', $commandegestionnaire->id), 'method' => 'PUT')) }}

		<div class="mb-3">
			{{ Form::label('panierG_id', 'PanierG_id', ['class'=>'form-label']) }}
			{{ Form::text('panierG_id', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('user_id', 'User_id', ['class'=>'form-label']) }}
			{{ Form::text('user_id', null, array('class' => 'form-control')) }}
		</div>

		{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
