@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{{ Form::model($facturegestionnaire, array('route' => array('facturegestionnaires.update', $facturegestionnaire->id), 'method' => 'PUT')) }}

		<div class="mb-3">
			{{ Form::label('commande_gestionnaire_id', 'Commande_gestionnaire_id', ['class'=>'form-label']) }}
			{{ Form::text('commande_gestionnaire_id', null, array('class' => 'form-control')) }}
		</div>

		{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
