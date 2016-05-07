@extends('layouts.app')

@section('title', 'Lista categoria de ovas')

@section('content')
	
	@include('admin.template.partials.errors')
	<div class="table-responsive">
		<br />
		<a href="../ovas/menu" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"> Volver</span></a>  <!--Enlace para registrar al menu de ovas-->
		<h3><legend>Búsqueda por: Categoria</legend></h3>
		<br />
		<center>
		@if(count($categories)>0)
		<table class="table table-striped">
			<thead>
					<th><big><b><center>Nombre</center></b></big></th>
					<th><big><b><center>Descripción</center></b></big></th>
			</thead>
		@foreach($categories as $category)   <!-- Ciclo para las categorias de ovas-->
				<tbody>
					<tr>
						<td>
							{!! Form::open(['route' =>['ovas.category.show', $category->id] , 'method' => 'GET']) !!}   <!-- Formulario para traer las categorias de ovas-->
								{!! Form::submit($category->name ,['class' => 'btn btn-warning']) !!}  <!-- Boton para seleccionar la categoria de ova-->
							{!! Form::close() !!}	
						</td>
						<td>
							{{$category->description}}<br><br>   <!-- Mostrar la descripcion de la categoria-->
						</td>
					</tr>
				</tbody>
		@endforeach
		</table>
		</center>
	<div class="text-center">
		{!! $categories->render() !!}          <!-- Paginacion de las categorias de ovas-->
	</div>
	@else
		<h3><legend>&nbsp;&nbsp;&nbsp;No se encontró ningún elemento.</legend></h3>	
	@endif
	</div>
@endsection