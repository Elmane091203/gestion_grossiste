@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{!! Form::open(['route' => 'stockfournisseurs.store']) !!}

		<div class="mb-3">
			{{ Form::label('quantite', 'Quantite', ['class'=>'form-label']) }}
			{{ Form::text('quantite', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('prixUnitaire', 'PrixUnitaire', ['class'=>'form-label']) }}
			{{ Form::text('prixUnitaire', null, array('class' => 'form-control')) }}
		</div>


		{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}


@stop