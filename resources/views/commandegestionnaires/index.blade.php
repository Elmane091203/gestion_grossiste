@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('commandegestionnaires.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>panierG_id</th>
				<th>user_id</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($commandegestionnaires as $commandegestionnaire)

				<tr>
					<td>{{ $commandegestionnaire->id }}</td>
					<td>{{ $commandegestionnaire->panierG_id }}</td>
					<td>{{ $commandegestionnaire->user_id }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('commandegestionnaires.show', [$commandegestionnaire->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('commandegestionnaires.edit', [$commandegestionnaire->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['commandegestionnaires.destroy', $commandegestionnaire->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
