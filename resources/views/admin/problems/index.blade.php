@extends('layouts.app')

@section('title', 'Lista de problemas')

@section('content')

	@include('admin.template.partials.errors')
	<div class="table-responsive">
		<a href="{{ route('admin.problems.create') }}" class="btn btn-info">Registrar nuevo problema</a>
		<table class="table table-striped">
			<thead>
				<th>N°</th>
				<th>Descripcion</th>
				<th>Estado</th>
				<th>Creador</th>
				<th>Accion</th>
			</thead>
			<tbody>
				<?php
					$cont = 1;
				?>
				@foreach($problems as $problem)
					<tr>
						<td>{!! $cont++; !!}</td>
						<td>{{ $problem->description }}</td>
						@if($problem->state == 0)
							<td><h4><span class="label label-primary">Sin resolver</span></h4></td>
						@else
							<td><h4><span class="label label-danger">Resuelto</span></h4></td>
						@endif
						<td>{{ $problem->user->name }}</td>
						<td>
							<a href="{{ route('admin.problems.edit', $problem->id) }}" class="btn btn-warning" title="Editar pronlema"><span class="glyphicon glyphicon-wrench" aria-hidden="true">Editar</span></a>
							<a href="{{ route('admin.problems.destroy', $problem->id) }}" onclick="return confirm('¿Seguro que quieres eliminarlo?')" class="btn btn-danger" title="Eliminar problema"><span class="glyphicon glyphicon-trash" aria-hidden="true">Eliminar</span></a>
						</td>
					</tr>
				@endforeach
			</tbody>	
		</table>
	</div>
	<div class="text-center">
		{!! $problems->render() !!}
	</div>
@endsection