@extends('layouts.app')   <!--Extender las herramientas que se utilizan en todas las ventanas-->

@section('title', 'Registrar categoria')       <!-- Seccion titulo de la pagina-->

@section('content')       <!-- Inicio de contenido-->

	@include('admin.template.partials.errors')    <!-- Revisar errores ventana-->
	{!! Form::open(['route' => 'admin.categories.store','method' => 'POST']) !!}  <!-- Abrir formulario para la creacion de categoria-->
		@include('admin.template.partials.fieldscategory')   <!-- Añadir a la ventana los campos-->
		<div class="form-group">   <!-- Estructura de formulario-->
			<center>
			{!! Form::submit('Registrar',['class' => 'btn btn-warning']) !!}    <!-- Boton para registrar-->
			<a href="{{ route('admin.categories.index') }}" class="btn btn btn-warning" title="Cancelar registro" name="Cancelar">Cancelar</a>    <!-- Enlace para cancelar registro-->
			</center>
		</div>
	{!! Form::close() !!}   <!-- Cerrar formulario-->
 	
@endsection            <!-- Fin de contenido-->