@extends('layouts.app')

@section('title', 'Lista de tipos')

@section('content')

	@include('admin.template.partials.errors')
	<div class="table-responsive">
		<a href="{{ route('admin.types.create') }}" class="btn btn-info">Registrar nuevo tipo</a>
		<table class="table table-striped">
			<thead>
				<th>Id</th>
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Acción</th>
			</thead>
			<tbody>
				@foreach($types as $type)
					<tr>
						<td>{{ $type->id }}</td>
						<td>{{ $type->name }}</td>
						<td>{{ $type->description }}</td>
						<td>
							<a href="{{ route('admin.types.edit', $type->id) }}" class="btn btn-warning" title="Editar tipo"><span class="glyphicon glyphicon-wrench" aria-hidden="true">Editar</span></a>
							<a href="{{ route('admin.types.destroy', $type->id) }}" onclick="return confirm('¿Seguro que quieres eliminarlo?')" class="btn btn-danger" title="Eliminar tipo"><span class="glyphicon glyphicon-trash" aria-hidden="true">Eliminar</span></a>
						</td>
					</tr>
				@endforeach
			</tbody>	
		</table>
	</div>		
	<div class="text-center">
		{!! $types->render() !!}
	</div>
	
@endsection