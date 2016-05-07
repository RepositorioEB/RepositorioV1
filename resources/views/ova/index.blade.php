@extends('layouts.app')

@section('title', 'Lista de ovas')

@section('content')
	
	@include('admin.template.partials.errors')
	<div class="table-responsive">
	<a href="{{ route('ovas.ovamember.create') }}" class="btn btn-info">Registrar nuevo ova</a>  <!-- Enlace para registrar nuevo ova-->
	{!! Form::open(['route' => 'ovas.ova.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}  <!-- Formulario para traer la lista de ovas segun el nombre ingresado-->
		<br><br>
		<label for="sel1">Seleccionar tipo de búsqueda:</label>
		<select class="form-control" id="sel1" name="select">  <!--Seleccionador de tipo de busqueda (nombre, tipo, categoria) -->
    		<option>Nombre</option>
    		<option>Tipo</option>
    		<option>Categoría</option>
  		</select>
		<label for="name">Ingresar nombre:</label>	
		<div class="input-group">
			<!-- Campo para ingresar el nombre a consultar-->
			{!! Form::text('name', null, ['id' => 'name','class' => 'form-control', 'placeholder' => 'Buscar ova', 'aria-describedby' => 'search']) !!}
			<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
		</div>
	{!! Form::close() !!}
	<br><br><br><br><br>
	@if(count($ovas)>0)
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Tipo</th>
			<th>Categoría</th>
			<th>Puntuación</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($ovas as $ova)         <!-- Ciclo de ovas-->
				@if($ova->state == true)    <!-- Condicion si el ova ya esta publicado-->
				<tr>
					<td>{{ $ova->name }}</td>
					<td>{{ $ova->type->name }}</td>
					<td>{{ $ova->category->name }}</td>
					<!-- Puntuacion del ova-->
					<td>&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $ova->punctuation}}</td>
					<td>
					    <a href="{{ route('ovas.ova.slug', $ova->slug) }}" class="btn btn-warning" title="Seleccionar OVA"><span class="glyphicon glyphicon-ok" aria-hidden="true">Seleccionar</span></a>   <!-- Enlace para seleccionar el ova-->
    				</td>
				</tr>
				@endif
			@endforeach
		</tbody>	
	</table>
	<div class="text-center">
		@if(isset($_GET['select']))
			{!! $ovas->appends(array('select' => $_GET['select'],'name' => $_GET['name']))->links()!!}   <!-- Paginacion de ovas con parametros-->
		@else
			{!! $ovas->render() !!}   <!-- Paginacion de ovas-->
		@endif
	</div>
	@else
	<br><br><br><br>
	<h3><legend>&nbsp;&nbsp;&nbsp;No se encontró ningún elemento.</legend></h3>
	@endif
	</div>
@endsection