@extends('layouts.app')                    <!--Extender las herramientas que se utilizan en todas las ventanas-->

@section('title', 'Lista de ayudas')         <!-- Seccion titulo de la pagina-->

@section('content')                 <!-- Inicio de contenido-->

	@include('admin.template.partials.errors')                 <!-- Revisar errores ventana-->
	<div class="table-responsive">              <!-- Clase para adaptacion movil-->
	<a href="{{ route('admin.helps.create') }}" class="btn btn-info">Registrar nuevo ayuda</a>             <!-- Enlace para registrar una nueva ayuda-->
	{!! Form::open(['route' => 'admin.helps.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}     <!-- Inicio de formulario para traer las ayudas registradas-->
			<label for="name">Buscar ayuda: </label>        <!-- Etiqueta ayuda-->
			<div class="input-group"> 
				{!! Form::text('name', null, ['id'=>'name','title'=>'Ingresar foro','class' => 'form-control', 'placeholder' => 'Buscar ayuda', 'aria-describedby' => 'search']) !!}     <!-- Campo para ingresar la ayuda-->
				<span class="input-group-addon" id="search">
					<span class="glyphicon glyphicon-search" aria-hidden="true"></span>              <!-- Icono de buscar-->
				</span>
			</div>
	{!! Form::close() !!}     <!-- Fin de ciclo-->
	<br><br><br>
		@if(count($helps)>0)
		<table class="table table-striped">         <!-- Tabla con estilo-->
			<thead>        <!-- Cabeza tabla-->
				<th>Nº</th>               <!-- Nombre columna-->
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Video</th>
				<th>Creador</th>
				<th>Acción</th>
			</thead>
			<tbody>         <!-- Cuerpo tabla-->
				<?php
					$cont = 1;          //Contador
				?>
				@foreach($helps as $help)         <!-- Ciclo de ayudas-->
					<tr>
						<td>{!! $cont++; !!}</td>            <!-- Contador-->
						<td>{{ $help->name }}</td>          <!-- Nombre ayuda-->
						<td>{!! $replace=str_replace("\r","<br>",$help->description); !!}</td>          <!-- Descripcion ayuda-->
						<td><video width="300" controls>
  								<source src="{{asset('videos/'.$help->video.'')}}">
							</video>
						</td>
						<td>{{ $help->user->name }}</td>          <!-- Nombre creador ayuda-->
						<td>
							<a href="{{ route('admin.helps.edit', $help->id) }}" class="btn btn-warning" title="Editar ayuda"><span class="glyphicon glyphicon-wrench" aria-hidden="true">Editar</span></a>          <!-- Enlace para modificar la ayuda-->
							<a href="{{ route('admin.helps.destroy', $help->id) }}" onclick="return confirm('¿Seguro que quieres eliminarlo?')" class="btn btn-danger" title="Eliminar ayuda"><span class="glyphicon glyphicon-trash" aria-hidden="true">Eliminar</span></a>         <!-- Enlace para eliminar la ayuda-->
						</td>
					</tr>
				@endforeach                    <!-- Fin de ciclo-->
			</tbody>	
		</table>
	<div class="text-center">
		{!! $helps->render() !!}               <!-- Paginacion de ayuda-->
	</div>
	@else
		<h3><legend>&nbsp;&nbsp;&nbsp;No se encontró ningún elemento.</legend></h3>
	@endif
	</div>
@endsection                  <!-- Fin de contenido-->