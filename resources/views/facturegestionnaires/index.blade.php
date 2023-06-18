@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('facturegestionnaires.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>commande_gestionnaire_id</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($facturegestionnaires as $facturegestionnaire)

				<tr>
					<td>{{ $facturegestionnaire->id }}</td>
					<td>{{ $facturegestionnaire->commande_gestionnaire_id }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('facturegestionnaires.show', [$facturegestionnaire->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('facturegestionnaires.edit', [$facturegestionnaire->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['facturegestionnaires.destroy', $facturegestionnaire->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
