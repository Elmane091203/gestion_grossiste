@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{!! Form::open(['route' => 'factureclients.store']) !!}

		<div class="mb-3">
			{{ Form::label('commande_client_id', 'Commande_client_id', ['class'=>'form-label']) }}
			{{ Form::text('commande_client_id', null, array('class' => 'form-control')) }}
		</div>


		{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}


@stop