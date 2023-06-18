@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{!! Form::open(['route' => 'paniergs.store']) !!}

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


		{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}


@stop