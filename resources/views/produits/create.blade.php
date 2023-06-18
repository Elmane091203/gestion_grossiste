@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{!! Form::open(['route' => 'produits.store']) !!}

		<div class="mb-3">
			{{ Form::label('libelle', 'Libelle', ['class'=>'form-label']) }}
			{{ Form::text('libelle', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('description', 'Description', ['class'=>'form-label']) }}
			{{ Form::textarea('description', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('stock', 'Stock', ['class'=>'form-label']) }}
			{{ Form::text('stock', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('prixUnitaire', 'PrixUnitaire', ['class'=>'form-label']) }}
			{{ Form::text('prixUnitaire', null, array('class' => 'form-control')) }}
		</div>


		{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}


@stop