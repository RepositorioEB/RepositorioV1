@extends('layouts.app')                              <!--Extender las herramientas que se utilizan en todas las ventanas-->

@section('title', 'Editar foro '.$forums->name)                   <!-- Seccion titulo de la pagina-->

@section('content')                    <!-- Inicio de contenido-->
	
	@include('admin.template.partials.errors')             <!-- Revisar errores ventana-->
	{!! Form::model($forums, ['route' => ['admin.forums.update',$forums->id],'method' => 'PUT']) !!}          <!-- Inicio de formulario para modificar el foro-->
		@include('admin.template.partials.fieldsforum')        <!-- Traer los campos de foro-->
		<div class="form-group">         <!-- Estructura del formulario-->
			<center>
			{!! Form::submit('Editar',['class' => 'btn btn-warning']) !!}                <!-- Boton para editar el foro-->
			<a href="{{ route('admin.forums.index') }}" class="btn btn btn-warning" title="Cancelar modificación" name="Cancelar">Cancelar</a>   <!-- Enlace para cancelar la modificacion del foro-->
			</center>
		</div>
	{!! Form::close() !!}       <!-- Fin de formulario-->
	
@endsection        <!-- Fin de contenido-->