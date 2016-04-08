@extends('layouts.app')              <!--Extender las herramientas que se utilizan en todas las ventanas-->

@section('title', 'Registrar foro')        <!-- Seccion titulo de la pagina-->

@section('content')               <!-- Inicio de contenido-->

	@include('admin.template.partials.errors')                            <!-- Revisar errores ventana-->
	{!! Form::open(['route' => 'admin.forums.store','method' => 'POST']) !!}                     <!-- Inicio de formulario para crear el foro-->
		@include('admin.template.partials.fieldsforum')               <!-- Traer capos de foro-->
		<div class="form-group">        <!-- Estructura del formulario-->
			<center>
			{!! Form::submit('Registrar',['class' => 'btn btn-warning']) !!}        <!--Boton para registrar foro -->
			<a href="{{ route('admin.forums.index') }}" class="btn btn btn-warning" title="Cancelar registro" name="Cancelar">Cancelar</a>        <!-- Enlace para cancelar el registro-->
 			</center>
		</div>
	{!! Form::close() !!}               <!-- Fin de formulario-->
	
@endsection            <!-- Fin de contenido-->
