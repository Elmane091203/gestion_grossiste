@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('paniergs.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>quantite</th>
				<th>etatG</th>
				<th>etatF</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($paniergs as $panierg)

				<tr>
					<td>{{ $panierg->id }}</td>
					<td>{{ $panierg->quantite }}</td>
					<td>{{ $panierg->etatG }}</td>
					<td>{{ $panierg->etatF }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('paniergs.show', [$panierg->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('paniergs.edit', [$panierg->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['paniergs.destroy', $panierg->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
