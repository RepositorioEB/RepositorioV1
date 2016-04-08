@extends('layouts.app')   <!--Extender las herramientas que se utilizan en todas las ventanas-->

@section('title', 'Editar categoria '.$categories->name)     <!-- Seccion titulo de la pagina-->

@section('content')    <!-- Inicio de contenido-->
	
	@include('admin.template.partials.errors')      <!-- Revisar errores ventana-->
	{!! Form::model($categories, ['route' => ['admin.categories.update',$categories->id],'method' => 'PUT']) !!}   <!-- Abrir formulario para enviar al controlador de moodificacion-->
		@include('admin.template.partials.fieldscategory')     <!-- Traer campos de categoria-->
		<div class="form-group">   <!--Estructura de formulario -->
			<center>
			{!! Form::submit('Editar',['class' => 'btn btn-warning']) !!}  <!-- Boton para editar la categoria-->
			<a href="{{ route('admin.categories.index') }}" class="btn btn btn-warning" title="Cancelar modificación" name="Cancelar">Cancelar</a>       <!-- Enlcae para cancelar la modificacion-->
			</center>
		</div>
	{!! Form::close() !!}   <!--Fin de formulario -->
	
@endsection         <!-- Fin de contenido-->