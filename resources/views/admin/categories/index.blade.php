@extends('layouts.app')          <!--Extender las herramientas que se utilizan en todas las ventanas-->

@section('title', 'Lista de categorias')      <!-- Seccion titulo de la pagina-->

@section('content')           <!-- Inicio de contenido-->

	@include('admin.template.partials.errors')     <!-- Revisar errores ventana-->
	<div class="table-responsive">         <!-- Clase para adaptacion a movil-->
		<a href="{{ route('admin.categories.create') }}" class="btn btn-info">Registrar nueva categoría</a>   <!-- Enlace para ingresar una nueva categoria-->
		@if(count($categories)>0)
		<table class="table table-striped">     <!-- Tabla con estilo-->
			<thead>        <!-- Cabeza de la tabla-->
				<th>N°</th>      <!-- Titulo columna-->
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Acción</th>
			</thead>
			<tbody>    <!-- Cuerpo de la tabla-->
				<?php        
					$cont = 1;     //Contador
				?>
				@foreach($categories as $category)            <!-- Ciclo de categorias-->
					<tr>     <!-- Fila de la tabla-->
						<td>{!! $cont++; !!}</td>     <!-- Mostrar contador en la celda-->
						<td>{{ $category->name }}</td>  <!-- Mostrar nombre categoria en la celda-->
						<td>{{ $category->description }}</td>   <!-- Mostrar descripcion categoria en la celda-->
						<td>
							<a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning" title="Editar categoría"><span class="glyphicon glyphicon-wrench" aria-hidden="true" >Editar</span></a>     <!-- Editar categoria-->
							<a href="{{ route('admin.categories.destroy', $category->id) }}" onclick="return confirm('¿Seguro que quieres eliminarlo?')" class="btn btn-danger" title="Eliminar categoría"><span class="glyphicon glyphicon-trash" aria-hidden="true">Eliminar</span></a>    <!-- Eliminar categoria-->
						</td>
					</tr>
				@endforeach    <!-- Fin ciclo-->
  			</tbody>	
		</table>
		<div class="text-center">
			{!! $categories->render() !!}          <!-- Mostrar paginacion-->
		</div>
		@else
			<h3><legend>&nbsp;&nbsp;&nbsp;No se encontró ningún elemento.</legend></h3>		
		@endif
	</div>
@endsection           <!-- Fin de contenido-->