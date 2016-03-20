@extends('layouts.app')

@section('title', 'Lista de problemas')

@section('content')

	@include('admin.template.partials.errors')
	<a href="{{ route('admin.problems.create') }}" class="btn btn-info">Registrar nuevo problema</a><br />
	<table class="table table-striped">
		<thead>
			<th>Id</th>
			<th>Descripcion</th>
			<th>Estado</th>
			<th>Creador</th>
			<th>Accion</th>
		</thead>
		<tbody>
			@foreach($problems as $problem)
				<tr>
					<td>{{ $problem->id }}</td>
					<td>{{ $problem->description }}</td>
					<td>{{ $problem->state }}</td>
					<td>{{ $problem->user->name }}</td>
					<td>
						<a href="{{ route('admin.problems.edit', $problem->id) }}" class="btn btn-warning" title="Editar"><span class="glyphicon glyphicon-wrench" aria-hidden="true">Editar</span></a>
						<a href="{{ route('admin.problems.destroy', $problem->id) }}" onclick="return confirm('¿Seguro que quieres eliminarlo?')" class="btn btn-danger" title="Eliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true">Eliminar</span></a>
					</td>
				</tr>
			@endforeach
		</tbody>	
	</table>
	<div class="text-center">
		{!! $problems->render() !!}
	</div>
	
@endsection