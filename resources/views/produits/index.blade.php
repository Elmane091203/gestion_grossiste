@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('produits.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>libelle</th>
				<th>description</th>
				<th>stock</th>
				<th>prixUnitaire</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($produits as $produit)

				<tr>
					<td>{{ $produit->id }}</td>
					<td>{{ $produit->libelle }}</td>
					<td>{{ $produit->description }}</td>
					<td>{{ $produit->stock }}</td>
					<td>{{ $produit->prixUnitaire }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('produits.show', [$produit->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('produits.edit', [$produit->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['produits.destroy', $produit->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
