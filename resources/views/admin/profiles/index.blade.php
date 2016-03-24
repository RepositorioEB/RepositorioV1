@extends('layouts.app')

@section('title', 'Lista de discapacidades')

@section('content')

	@include('admin.template.partials.errors')
	<div class="table-responsive">
		<a href="{{ route('admin.profiles.create') }}" class="btn btn-info">Registrar nueva discapacidad</a>
		<table class="table table-striped">
			<thead>
				<th>Id</th>
				<th>Nombre</th>
				<th>Caracteristicas</th>
				<th>Accion</th>
			</thead>
			<tbody>
				@foreach($profiles as $profile)
					<tr>
						<td>{{ $profile->id }}</td>
						<td>{{ $profile->name }}</td>
						<td>{{ $profile->characteristic }}</td>
						<td>
							<a href="{{ route('admin.profiles.edit', $profile->id) }}" class="btn btn-warning" title="Editar"><span class="glyphicon glyphicon-wrench" aria-hidden="true">Editar</span></a>
							<a href="{{ route('admin.profiles.destroy', $profile->id) }}" onclick="return confirm('¿Seguro que quieres eliminarlo?')" class="btn btn-danger" title="Eliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true">Eliminar</span></a>
						</td>
					</tr>
				@endforeach
			</tbody>	
		</table>
	</div>
	<div class="text-center">
		{!! $profiles->render() !!}
	</div>
	
@endsection