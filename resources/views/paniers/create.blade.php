@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{!! Form::open(['route' => 'paniers.store']) !!}

		<div class="mb-3">
			{{ Form::label('quantite', 'Quantite', ['class'=>'form-label']) }}
			{{ Form::number('quantite', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('etatC', 'EtatC', ['class'=>'form-label']) }}
			{{ Form::text('etatC', null, array('class' => 'form-control','min'=>'0')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('etatG', 'EtatG', ['class'=>'form-label']) }}
			{{ Form::text('etatG', null, array('class' => 'form-control')) }}
		</div>


		{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}


@stop