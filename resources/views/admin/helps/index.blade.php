@extends('layouts.app')

@section('title', 'Lista de ayudas')

@section('content')

	@include('admin.template.partials.errors')
	<div class="table-responsive">
		<a href="{{ route('admin.helps.create') }}" class="btn btn-info">Registrar nuevo ayuda</a>
		<table class="table table-striped">
			<thead>
				<th>N°</th>
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Enlace</th>
				<th>Creador</th>
				<th>Acción</th>
			</thead>
			<tbody>
				<?php
					$cont = 1;
				?>
				@foreach($helps as $help)
					<tr>
						<td>{!! $cont++; !!}</td>
						<td>{{ $help->name }}</td>
						<td>{{ $help->description }}</td>
						<td>{{ $help->video }}</td>
						<td>{{ $help->user->name }}</td>
						<td>
							<a href="{{ route('admin.helps.edit', $help->id) }}" class="btn btn-warning" title="Editar ayuda"><span class="glyphicon glyphicon-wrench" aria-hidden="true">Editar</span></a>
							<a href="{{ route('admin.helps.destroy', $help->id) }}" onclick="return confirm('¿Seguro que quieres eliminarlo?')" class="btn btn-danger" title="Eliminar ayuda"><span class="glyphicon glyphicon-trash" aria-hidden="true">Eliminar</span></a>
						</td>
					</tr>
				@endforeach
			</tbody>	
		</table>
	</div>
	<div class="text-center">
		{!! $helps->render() !!}
	</div>
	
@endsection