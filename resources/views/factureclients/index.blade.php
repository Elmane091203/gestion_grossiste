@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('factureclients.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>commande_client_id</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($factureclients as $factureclient)

				<tr>
					<td>{{ $factureclient->id }}</td>
					<td>{{ $factureclient->commande_client_id }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('factureclients.show', [$factureclient->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('factureclients.edit', [$factureclient->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['factureclients.destroy', $factureclient->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
