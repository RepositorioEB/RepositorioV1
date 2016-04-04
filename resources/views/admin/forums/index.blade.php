@extends('layouts.app')

@section('title', 'Lista de foros')

@section('content')

	@include('admin.template.partials.errors')
	<div class="table-responsive">
		<a href="{{ route('admin.forums.create') }}" class="btn btn-info">Registrar nuevo foro</a>
		{!! Form::open(['route' => 'admin.forums.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
			<label for="name">Buscar foro: </label>
			<div class="input-group">
				{!! Form::text('name', null, ['id'=>'name','title'=>'Ingresar foro','class' => 'form-control', 'placeholder' => 'Buscar foro', 'aria-describedby' => 'search']) !!}
				<span class="input-group-addon" id="search">
					<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
				</span>
			</div>
		{!! Form::close() !!}
		<table class="table table-striped">
			<thead>
				<th>N°</th>
				<th>Nombre</th>
				<th>Caracteristicas</th>
				<th>Creador</th>
				<th>Accion</th>
			</thead>
			<tbody>
				<?php
					$cont = 1;
				?>
				@foreach($forums as $forum)
					<tr>
						<td>{!! $cont++; !!}</td>
						<td>{{ $forum->name }}</td>
						<td>{{ $forum->characteristic }}</td>
						<td>{{ $forum->user->name }}</td>
						<td>
							<a href="{{ route('admin.forums.edit', $forum->id) }}" class="btn btn-warning" title="Editar foro"><span class="glyphicon glyphicon-wrench" aria-hidden="true">Editar</span></a>
							<a href="{{ route('admin.forums.destroy', $forum->id) }}" onclick="return confirm('¿Seguro que quieres eliminarlo?')" class="btn btn-danger" title="Eliminar foro"><span class="glyphicon glyphicon-trash" aria-hidden="true">Eliminar</span></a>
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