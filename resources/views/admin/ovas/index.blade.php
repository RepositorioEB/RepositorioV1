@extends('layouts.app')

@section('title', 'Lista de ovas')

@section('content')

	@include('admin.template.partials.errors')
		<a href="{{ route('admin.ovas.create') }}" class="btn btn-info">Registrar nuevo ova</a>   <!-- Enlace registrar nuevo ova-->
		<br><br>
		{!! Form::open(['route' => 'admin.ovas.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}   <!-- Formulario para seleccionar ova -->
		<label for="sel1">Seleccionar tipo de búsqueda:</label>  
		<select class="form-control" id="sel1" name="select">   <!-- Seleccionador para buscar ova por nombre tipo o categoria-->
    		<option>Nombre</option>
    		<option>Tipo</option>
    		<option>Categoría</option>
  		</select>
		<label for="name">Ingresar nombre:</label>	
		<div class="input-group">
		{!! Form::text('name', null, ['id' => 'name','class' => 'form-control', 'placeholder' => 'Buscar ova', 'aria-describedby' => 'search']) !!}   <!-- Campo para ingresar nombre ova a buscar -->
			<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
		</div>
		{!! Form::close() !!}
	@if(count($ovas)>0)
	<table class="table table-striped">
			<thead>
				<th>N°</th>
				<th>Nombre</th>
				<th>Puntuación</th>
				<th>Tipo</th>
				<th>Categoría</th>
				<th>Estado</th>
				<th>Acción</th>
			</thead>
			<tbody>
				<?php
					$cont = 1;
				?>
				@foreach($ovas as $ova)     <!-- Ciclo ovas-->
					<tr>
						<td>{!! $cont++; !!}</td>
						<td>{{ $ova->name }}</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $ova->punctuation}}</td>    <!--Mostrar puntuacion del ova -->
						<td>{{ $ova->type->name }}</td>
						<td>{{ $ova->category->name }}</td>
						<td>
							@if ($ova->state)             <!-- Mostrar etiqueta segun estado-->
								<h4><span class="label label-danger">{{ 'Subido' }}</span></h4>
							@else
								<h4><span class="label label-primary">{{ 'Solicitud' }}</span></h4>
							@endif
						</td>
						<td>
							<a href="{{ route('admin.ovas.edit', $ova->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>Editar</a>        <!-- Enlace para editar ova-->
							<a href="{{ route('admin.ovas.destroy', $ova->id) }}" onclick="return confirm('¿Seguro que quieres eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Eliminar</a>   <!-- Enlace para eliminar ova-->
						</td>
					</tr>
				@endforeach
			</tbody>	
		</table>
	<div class="text-center">
		@if(isset($_GET['select']))
			{!! $ovas->appends(array('select' => $_GET['select'],'name' => $_GET['name']))->links()!!}   <!-- Paginacion ovas-->
		@else
			{!! $ovas->render() !!}
		@endif
	</div>
	@else
	<br><br><br><br>
	<h3><legend>&nbsp;&nbsp;&nbsp;No se encontró ningún elemento.</legend></h3>
	@endif
			
@endsection