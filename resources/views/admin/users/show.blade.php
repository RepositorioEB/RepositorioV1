@extends('layouts.app')

@section('title', 'Datos del usuario '.$user->name)

@section('content')

	@include('admin.template.partials.errors')
	<a href="{{ route('admin.users.index') }}" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a>
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
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
					<td>{{ $user->name }}</td>
					<td>{{ $user->last_name }}</td>
					<td>{{ $user->nickname }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->gender }}</td>
					<td>{{ $user->date }}</td>
					<td>{{ $user->studies }}</td>
					<td>{{ $user->country }}</td>
				</tr>
		</tbody>	
	</table>
	
@endsection