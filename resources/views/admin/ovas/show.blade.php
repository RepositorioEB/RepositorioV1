@extends('layouts.app')

@section('title', 'Datos del ova '.$ova->name)

@section('content')

	@include('admin.template.partials.errors')
<<<<<<< HEAD
=======
	<a href="{{ route('admin.ovas.index') }}" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a>
<<<<<<< HEAD
	<table class="table table-striped">
		<thead>
			<th>Id</th>
			<th>Nombre</th>
			<th>Lenguaje</th>
			<th>Descripcion</th>
			<th>Archive</th>
			<th>Creador</th>
		</thead>
		<tbody>
				<tr>
					<td>{{ $ova->name }}</td>
					<td>{{ $ova->language }}</td>
					<td>{{ $ova->description }}</td>
					<td>{{ $ova->archive }}</td>
					<td>{{ $ova->user->name }}
					</td>
				</tr>
		</tbody>	
	</table>
=======
>>>>>>> origin/master
	<div class="table-responsive">
		<a href="{{ route('admin.ovas.index') }}" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a>
		<table class="table table-striped">
			<thead>
				<th>Id</th>
				<th>Nombre</th>
				<th>Lenguaje</th>
				<th>Descripcion</th>
				<th>Archive</th>
				<th>Creador</th>
			</thead>
			<tbody>
					<tr>
						<td>{{ $ova->name }}</td>
						<td>{{ $ova->lenguaje }}</td>
						<td>{{ $ova->description }}</td>
						<td>{{ $ova->archive }}</td>
						<td>{{ $ova->user->name }}
						</td>
					</tr>
			</tbody>	
		</table>
	</div>
>>>>>>> origin/master
	
@endsection