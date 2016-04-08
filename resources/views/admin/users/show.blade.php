@extends('layouts.app')

@section('title', 'Datos del usuario '.$user->name)

@section('content')

	@include('admin.template.partials.errors')
		<div class="table-responsive">
		<a href="{{ route('admin.users.index') }}" title="Botón volver" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"> Volver</span></a> 
		<table class="table table-striped">
		<thead>
			<th>Nombre</th>   <!-- Nombre columnas tabla usuarios-->
			<th>Apellido</th>
			<th>Nickname</th>
			<th>Correo</th>
			<th>Genero</th>
			<th>F.Nacimiento</th>
			<th>Estudios</th>
			<th>Pais</th>
		</thead>
		<tbody>
				<tr>
					<td>{{ $user->name }}</td>             <!-- Informacion usuario-->
					<td>{{ $user->last_name }}</td>
					<td>{{ $user->username }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->gender }}</td>
					<td>{{ $user->date }}</td>
					<td>{{ $user->studies }}</td>
					<td>{{ $country }}</td>
				</tr>
		</tbody>	
	</table>
	</div>
	
@endsection