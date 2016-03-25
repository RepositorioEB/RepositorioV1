@extends('layouts.app')

@section('title', 'Lista de ayudas')

@section('content')

	@include('admin.template.partials.errors')
	<div class="table-responsive">
		<a href="{{ route('admin.forums.create') }}" class="btn btn-info">Registrar nuevo foro</a>
		<table class="table table-striped">
			<thead>
				<th>Id</th>
				<th>Nombre</th>
				<th>Caracteristicas</th>
				<th>Creador</th>
				<th>Accion</th>
			</thead>
			<tbody>
				@foreach($forums as $forum)
					<tr>
						<td>{{ $forum->id }}</td>
						<td>{{ $forum->name }}</td>
						<td>{{ $forum->characteristic }}</td>
						<td>{{ $forum->user->name }}</td>
						<td>
							<a href="{{ route('admin.forums.edit', $forum->id) }}" class="btn btn-warning" title="Editar"><span class="glyphicon glyphicon-wrench" aria-hidden="true">Editar</span></a>
							<a href="{{ route('admin.forums.destroy', $forum->id) }}" onclick="return confirm('¿Seguro que quieres eliminarlo?')" class="btn btn-danger" title="Eliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true">Eliminar</span></a>
						</td>
					</tr>
				@endforeach
			</tbody>	
		</table>
	</div>
	<div class="text-center">
		{!! $forums->render() !!}
	</div>
	
@endsection