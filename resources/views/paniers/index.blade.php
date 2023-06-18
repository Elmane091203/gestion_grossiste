@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('paniers.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>quantite</th>
				<th>etatC</th>
				<th>etatG</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($paniers as $panier)

				<tr>
					<td>{{ $panier->id }}</td>
					<td>{{ $panier->quantite }}</td>
					<td>{{ $panier->etatC }}</td>
					<td>{{ $panier->etatG }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('paniers.show', [$panier->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('paniers.edit', [$panier->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['paniers.destroy', $panier->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
