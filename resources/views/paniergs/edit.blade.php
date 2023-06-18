@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{{ Form::model($panierg, array('route' => array('paniergs.update', $panierg->id), 'method' => 'PUT')) }}

		<div class="mb-3">
			{{ Form::label('quantite', 'Quantite', ['class'=>'form-label']) }}
			{{ Form::text('quantite', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('etatG', 'EtatG', ['class'=>'form-label']) }}
			{{ Form::string('etatG', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('etatF', 'EtatF', ['class'=>'form-label']) }}
			{{ Form::string('etatF', null, array('class' => 'form-control')) }}
		</div>

		{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
