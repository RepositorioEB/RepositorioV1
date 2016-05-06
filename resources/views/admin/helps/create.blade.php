@extends('layouts.app')             <!--Extender las herramientas que se utilizan en todas las ventanas-->

@section('title', 'Registrar ayuda')                  <!-- Seccion titulo de la pagina-->

@section('content')                  <!-- Inicio de contenido-->

	@include('admin.template.partials.errors')                <!-- Revisar errores ventana-->
	{!! Form::open(['route' => 'admin.helps.store','method' => 'POST', 'files' => true]) !!}           <!-- Formulario para la creacion de la ayuda-->
		@include('admin.template.partials.fieldshelp')    <!-- Traer campos de ayuda-->
		<div class="form-group">    <!-- Estructura formulario-->
			<center>
			{!! Form::submit('Registrar',['class' => 'btn btn-warning']) !!}             <!-- Boton de registro-->
			<a href="{{ route('admin.helps.index') }}" class="btn btn btn-warning" title="Cancelar registro" name="Cancelar">Cancelar</a>        <!-- Enlace para cancelar registro-->
			</center>
		</div>
	{!! Form::close() !!}                 <!-- Fin de formulario-->
	
@endsection              <!-- Fin de contenido-->
