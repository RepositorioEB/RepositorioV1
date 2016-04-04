@extends('layouts.app')

@section('title', 'Lista de descargas')

@section('content')

	@include('admin.template.partials.errors')
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<th>N°</th>
				<th>Usuario</th>
				<th>Ova</th>
				<th>Fecha</th>
				<th>Acción</th>
			</thead>
			<tbody>
				<?php
					$cont = 1;
				?>
				@foreach($downloads as $download)
					<tr>
						<td>{!! $cont++; !!}</td>
						<td>{{ $download->user->name }}</td>
						<td>{{ $download->ova->name }}</td>
						<td>{{ $download->created_at }}</td>
						<td>
							<a href="{{ route('admin.downloads.edit', $download->id) }}" class="btn btn-warning" title="Editar descarga"><span class="glyphicon glyphicon-wrench" aria-hidden="true">Editar</span></a>
							<a href="{{ route('admin.downloads.destroy', $download->id) }}" onclick="return confirm('¿Seguro que quieres eliminarlo?')" class="btn btn-danger" title="Eliminar descarga"><span class="glyphicon glyphicon-trash" aria-hidden="true">Eliminar</span></a>
						</td>
					</tr>
				@endforeach
			</tbody>	
		</table>
	</div>
	<div class="text-center">
		{!! $downloads->render() !!}
	</div>
	
@endsection