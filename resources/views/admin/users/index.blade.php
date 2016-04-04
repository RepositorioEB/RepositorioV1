@extends('layouts.app')

@section('title', 'Lista de usuarios')

@section('content')
	
	@include('admin.template.partials.errors')
	<div class="table-responsive">
		<a href="{{ route('admin.users.create') }}" class="btn btn-info">Registrar nuevo usuario</a>
		{!! Form::open(['route' => 'admin.users.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
			<label for="name">Buscar usuario: </label>
			<div class="input-group">
				{!! Form::text('name', null, ['id'=>'name','title'=>'Ingresar usuario','class' => 'form-control', 'placeholder' => 'Buscar usuario', 'aria-describedby' => 'search']) !!}
				<span class="input-group-addon" id="search">
					<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
				</span>
			</div>
		{!! Form::close() !!}
		<table class="table table-striped">
			<thead>
				<th>N°</th>
				<th>Nombre</th>
				<th>Username</th>
				<th>Correo</th>
				<th>Rol</th>
				<th>Discapacidad</th>
				<th>Accion</th>
			</thead>
			<tbody>
				<?php
					$cont = 1;
				?>
				@foreach($users as $user)
					<tr>
						<td>{!! $cont++; !!}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->username }}</td>
						<td>{{ $user->email }}</td>
						<td>
							@if ($user->role == "admin")
								<h4><span class="label label-danger">{{ $user->role }}</span></h4>
							@else
								<h4><span class="label label-primary">{{ $user->role }}</span></h4>
							@endif
						</td>
						<td>{{ $user->profile->name }}</td>
						<td>
							<a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning" title="Editar usuario"><span class="glyphicon glyphicon-wrench" aria-hidden="true">Editar</span></a>
							@if(\Auth::user()->id != $user->id)
								<a href="{{ route('admin.users.destroy', $user->id) }}" onclick="return confirm('¿Seguro que quieres eliminarlo?')" class="btn btn-danger" title="Eliminar usuario"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true">Eliminar</span></a>
							@endif
							<a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-info" title="Consultar usuario"><span class="glyphicon glyphicon-folder-open" aria-hidden="true">Consultar</span></a>
						</td>
					</tr>
				@endforeach
			</tbody>	
		</table>
	</div>
	<div class="text-center">
		{!! $users->render() !!}
	</div>
@endsection