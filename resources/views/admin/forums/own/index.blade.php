@extends('layouts.app')           <!--Extender las herramientas que se utilizan en todas las ventanas-->

@section('title', 'Foros propios')              <!-- Seccion titulo de la pagina-->

@section('content')           <!-- Inicio de contenido-->

	@include('admin.template.partials.errors')               <!-- Revisar errores ventana-->
	<div class="table-responsive">                    <!-- Clase para adaptacion movil-->
		<a href="{{ route('admin.forums.create') }}" class="btn btn-info">Registrar nuevo foro</a>    <!-- Enlace para registrar un nuevo foro-->
		<?php
			$i=0;
		?>
		@foreach($forums as $forum)            <!-- Ciclo de foros-->
			@if($forum->user_id == Auth::user()->id)             <!-- Condicion para buscar la identificacion del usuario que inicio sesion-->
				<?php
					$i=1;
				?>	
			@endif    <!-- Fin de condicional-->
		@endforeach     <!-- Fin ciclo-->
		@if($i==1)
		<table class="table table-striped">              <!-- Tabla con estilo-->
			<thead>  <!-- Cabeza de la tabla-->
				<th>Nombre</th>        <!-- Nombre columna-->
				<th>Características</th>
				<th>Acción</th>
			</thead>
			<tbody>          <!-- Cuerpo con tabla-->
				@foreach($forums as $forum)            <!-- Ciclo de foros-->
					@if($forum->user_id == Auth::user()->id)             <!-- Condicion para buscar la identificacion del usuario que inicio sesion-->
					<tr>
						<td>{{ $forum->name }}</td>                   <!-- Nombre de foro-->
						<td>{{ $forum->characteristic }}</td>            <!-- Caracteristicas de foro-->
						<td>
							<a href="{{ route('admin.forums.edit', $forum->id) }}" class="btn btn-warning" title="Editar foro"><span class="glyphicon glyphicon-wrench" aria-hidden="true">Editar</span></a>              <!-- Enlace para editar foro-->
							<a href="{{ route('admin.forums.destroy', $forum->id) }}" onclick="return confirm('¿Seguro que quieres eliminarlo?')" class="btn btn-danger" title="Eliminar foro"><span class="glyphicon glyphicon-trash" aria-hidden="true">Eliminar</span></a>          <!-- Enlace para eliminar foro-->
						</td>
					</tr>
					@endif    <!-- Fin de condicional-->
				@endforeach     <!-- Fin ciclo-->
			</tbody>	
		</table>
		<div class="text-center">
			{!! $forums->render() !!}      <!-- Paginacion de foros-->
		</div>
		@else
			<h3><legend>&nbsp;&nbsp;&nbsp;No se encontró ningún elemento.</legend></h3>		
		@endif
	</div>
@endsection          <!-- Fin de contenido-->