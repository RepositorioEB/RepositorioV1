@extends('layouts.app')   <!--Extender las herramientas que se utilizan en todas las ventanas-->

@section('title', 'Lista de descargas')  <!-- Seccion titulo de la pagina-->

@section('content')             <!-- Inicio de contenido-->

	@include('admin.template.partials.errors')                   <!-- Revisar errores ventana-->
	<div class="table-responsive">                  <!-- Clase para adaptacion movil-->
		@if(count($downloads)>0)
		<table class="table table-striped">                  <!-- Tabla con estilo-->
			<thead>                 <!-- Cabeza tabla-->
				<th>N°</th>               <!-- Nombre columna tabla-->
				<th>Usuario</th>
				<th>Ova</th>
				<th>Fecha</th>
				<th>Acción</th>
			</thead>
			<tbody>                            <!-- Cuerpo tabla-->
				<?php
					$cont = 1;           //contador
				?>
				@foreach($downloads as $download)      <!-- Inicio de ciclodescargas-->
					<tr>
						<td>{!! $cont++; !!}</td>            <!-- Contador-->
						<td>{{ $download->user->name }}</td>      <!-- Nombre descarga-->
						<td>{{ $download->ova->name }}</td>       <!-- Nombre ova-->
						<td>{{ $download->created_at }}</td>      <!-- Fecha insercion-->
						<td>
							<a href="{{ route('admin.downloads.destroy', $download->id) }}" onclick="return confirm('¿Seguro que quieres eliminarlo?')" class="btn btn-danger" title="Eliminar descarga"><span class="glyphicon glyphicon-trash" aria-hidden="true">Eliminar</span></a>     <!-- Enlace eliminar descarga-->
						</td>
					</tr>
				@endforeach            <!-- Fin ciclo-->
			</tbody>	
		</table>
		<div class="text-center">
			{!! $downloads->render() !!}             <!-- Paginacion de descargas-->
 		</div>
 		@else
 			<h3><legend>&nbsp;&nbsp;&nbsp;No se encontró ningún elemento.</legend></h3>		
		@endif
	</div>
	
@endsection       <!-- Fin de contenido-->