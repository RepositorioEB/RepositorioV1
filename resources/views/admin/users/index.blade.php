@extends('layouts.app')

@section('title', 'Lista de usuarios')

@section('content')
	
	@include('admin.template.partials.errors')
	<a href="{{ route('admin.users.create') }}" class="btn btn-info">Registrar nuevo usuario</a>
	{!! Form::open(['route' => 'admin.users.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
		<div class="input-group">
			{!! Form::text('name', null, ['title'=>'Buscar usuario','class' => 'form-control', 'placeholder' => 'Buscar usuario', 'aria-describedby' => 'search']) !!}
			<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
		</div>
	{!! Form::close() !!}
	<br />
	<table class="table table-striped">
		<thead>
			<th>Id</th>
			<th>Nombre</th>
			<th>Username</th>
			<th>Correo</th>
			<th>Estado</th>
			<th>Rol</th>
			<th>Discapacidad</th>
			<th>Accion</th>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->username }}</td>
					<td>{{ $user->email }}</td>
					<td>
						@if ($user->state)
							<h4><span class="label label-danger">{{ 'Activo' }}</span></h4>
						@else
							<h4><span class="label label-primary">{{ 'Solicitud' }}</span></h4>
						@endif
					</td>
					<td>
						@if ($user->role == "admin")
							<h4><span class="label label-danger">{{ $user->role }}</span></h4>
						@else
							<h4><span class="label label-primary">{{ $user->role }}</span></h4>
						@endif
					</td>
					<td>{{ $user->profile->name }}</td>
					<td>
						<a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning" title="Editar"><span class="glyphicon glyphicon-wrench" aria-hidden="true">Editar</span></a>
						<a href="{{ route('admin.users.destroy', $user->id) }}" onclick="return confirm('¿Seguro que quieres eliminarlo?')" class="btn btn-danger" title="Eliminar"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true">Eliminar</span></a>
						<a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-info" title="Consultar"><span class="glyphicon glyphicon-folder-open" aria-hidden="true">Consultar</span></a>
					</td>
				</tr>
			@endforeach
		</tbody>	
	</table>
	<div class="text-center">
		{!! $users->render() !!}
	</div>
@endsection