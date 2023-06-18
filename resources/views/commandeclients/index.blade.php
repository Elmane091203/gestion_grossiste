@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('commandeclients.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>panier_id</th>
				<th>user_id</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($commandeclients as $commandeclient)

				<tr>
					<td>{{ $commandeclient->id }}</td>
					<td>{{ $commandeclient->panier_id }}</td>
					<td>{{ $commandeclient->user_id }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('commandeclients.show', [$commandeclient->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('commandeclients.edit', [$commandeclient->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['commandeclients.destroy', $commandeclient->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
