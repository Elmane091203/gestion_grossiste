@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('stockfournisseurs.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>quantite</th>
				<th>prixUnitaire</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($stockfournisseurs as $stockfournisseur)

				<tr>
					<td>{{ $stockfournisseur->id }}</td>
					<td>{{ $stockfournisseur->quantite }}</td>
					<td>{{ $stockfournisseur->prixUnitaire }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('stockfournisseurs.show', [$stockfournisseur->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('stockfournisseurs.edit', [$stockfournisseur->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['stockfournisseurs.destroy', $stockfournisseur->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
