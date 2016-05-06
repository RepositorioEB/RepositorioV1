@extends('layouts.app')          <!--Extender las herramientas que se utilizan en todas las ventanas-->

@section('title', 'Lista de foros')  <!-- Seccion titulo de la pagina-->

@section('content')                     <!-- Inicio de contenido-->

	@include('admin.template.partials.errors')            <!-- Revisar errores ventana-->
	<div class="table-responsive">                     <!-- Clase para adaptacion movil-->
		<a href="{{ route('admin.forums.create') }}" class="btn btn-info">Registrar nuevo foro</a>       <!-- Enlace para registrar un foro nuevo-->
		{!! Form::open(['route' => 'admin.forums.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}       <!-- Incio de formulario para mostrar los foros registrados-->
			<label for="name">Buscar foro: </label>           <!-- Etiqueta de campo nombre foro-->
			<div class="input-group">
				{!! Form::text('name', null, ['id'=>'name','title'=>'Ingresar foro','class' => 'form-control', 'placeholder' => 'Buscar foro', 'aria-describedby' => 'search']) !!}      <!-- Campo para ingresar el foro a buscar-->
				<span class="input-group-addon" id="search">
					<span class="glyphicon glyphicon-search" aria-hidden="true"></span>    <!-- Mostrar icono de buscar-->
				</span>
			</div>
		{!! Form::close() !!}               <!-- Fin de formulario-->
		@if(count($forums)>0)
		<table class="table table-striped">   <!-- Tabla con estilo-->
			<thead>               <!-- Cabeza de tabla-->
				<th>Nº</th>     <!-- Nombre columna-->
				<th>Nombre</th>
				<th>Características</th>
				<th>Creador</th>
				<th>Acción</th>
			</thead>
			<tbody>             <!-- Cuerpo de tabla-->
				<?php
					$cont = 1;          //Contador
				?>
				@foreach($forums as $forum)           <!-- Ciclo para foros-->
					<tr>
						<td>{!! $cont++; !!}</td>        <!-- Contador-->
						<td>{{ $forum->name }}</td>        <!-- Nombre foro-->
						<td>{{ $forum->characteristic }}</td>    <!-- Caracteristicas de foro-->
						<td>{{ $forum->user->name }}</td>          <!-- Nombre usuario creador de foro-->
						<td>
							<a href="{{ route('admin.forums.edit', $forum->id) }}" class="btn btn-warning" title="Editar foro"><span class="glyphicon glyphicon-wrench" aria-hidden="true">Editar</span></a>         <!-- Enlave para editar el foro-->
							<a href="{{ route('admin.forums.destroy', $forum->id) }}" onclick="return confirm('¿Seguro que quieres eliminarlo?')" class="btn btn-danger" title="Eliminar foro"><span class="glyphicon glyphicon-trash" aria-hidden="true">Eliminar</span></a>    <!-- Enlace para eliminar el foro-->
						</td>
					</tr>
				@endforeach     <!-- Fin ciclo-->
			</tbody>	
		</table>
	<div class="text-center">
		{!! $forums->render() !!}             <!-- Paginacion de foros-->
	</div>
	@else
		<br><br><br><br>
		<h3><legend>&nbsp;&nbsp;&nbsp;No se encontró ningún elemento.</legend></h3>
	@endif
	</div>
@endsection     <!-- Fin de contenido-->