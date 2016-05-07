@extends('layouts.app')

@section('title', 'Ovas propios')

@section('content')
	
	@include('admin.template.partials.errors')
	<div class="table-responsive">
	<a href="{{ route('ovas.ovamember.create') }}" class="btn btn-info">Registrar nuevo ova</a>   <!-- Enlace para registrar un nueo ova-->
	<br><br><br>
	<?php
		$i=0;
	?>
	@foreach($ovas as $ova)     <!-- Ciclo de ovas-->
		@if($ova->user_id == Auth::user()->id)         <!-- Condicion si el ova es del usuario-->
			<?php
				$i=1;
			?>
		@endif
	@endforeach
	@if($i==1)
		<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Tipo</th>
			<th>Categoría</th>
			<th>Puntuación</th>
			<th>Estado</th>
		</thead>
		<tbody>
			@foreach($ovas as $ova)     <!-- Ciclo de ovas-->
				@if($ova->user_id == Auth::user()->id)         <!-- Condicion si el ova es del usuario-->
				<tr>
					<td>{{ $ova->name }}</td>
					<td>{{ $ova->type->name }}</td>
					<td>{{ $ova->category->name }}</td>
					<!-- Puntuacion registrada del voa-->
					<td>&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $ova->punctuation}}</td>
					<td>
							@if ($ova->state)   <!-- Condicion si el ova ya fue subido o se encuentra en solicitud-->
								<h4><span class="label label-danger">{{ 'Subido' }}</span></h4>
							@else
								<h4><span class="label label-primary">{{ 'Solicitud' }}</span></h4>
							@endif
					</td>	
				</tr>
				@endif
			@endforeach
		</tbody>	
	</table>
	<div class="text-center">
		{!! $ovas->render() !!}    <!-- Paginacion de ovas-->
	</div>
	@else
		<h3><legend>&nbsp;&nbsp;&nbsp;No se encontró ningún elemento.</legend></h3>	
	@endif
	</div>
@endsection