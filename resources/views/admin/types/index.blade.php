@extends('layouts.app')

@section('title', 'Lista de tipos')

@section('content')

	@include('admin.template.partials.errors')
	<div class="table-responsive">
		<a href="{{ route('admin.types.create') }}" class="btn btn-info">Registrar nuevo tipo</a>  <!-- Enlace registrar nuevo tipo de ova-->
		@if(count($types)>0)
		<table class="table table-striped">
			<thead>
				<th>N°</th>
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Acción</th>
			</thead>
			<tbody>
				<?php
					$cont = 1;
				?>
				@foreach($types as $type)  <!-- Ciclo de tipos de ova-->
					<tr>
						<td>{!! $cont++; !!}</td>
						<td>{{ $type->name }}</td>
						<td>{{ $type->description }}</td>
						<td>
							<a href="{{ route('admin.types.edit', $type->id) }}" class="btn btn-warning" title="Editar tipo"><span class="glyphicon glyphicon-wrench" aria-hidden="true">Editar</span></a>    <!-- Enlace modificar tipo de ova-->
							<a href="{{ route('admin.types.destroy', $type->id) }}" onclick="return confirm('¿Seguro que quieres eliminarlo?')" class="btn btn-danger" title="Eliminar tipo"><span class="glyphicon glyphicon-trash" aria-hidden="true">Eliminar</span></a>   <!-- Enlace eliminar tipo de ova-->
						</td>
					</tr>
				@endforeach
			</tbody>	
		</table>
		<div class="text-center">
			{!! $types->render() !!}    <!--Paginacion tipo de ova -->
		</div>
		@else
			<h3><legend>&nbsp;&nbsp;&nbsp;No se encontró ningún elemento.</legend></h3>		
		@endif
	</div>		
	
@endsection