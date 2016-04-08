@extends('layouts.app')           <!--Extender las herramientas que se utilizan en todas las ventanas-->

@section('title', 'Editar descarga '.$downloads->name)          <!-- Seccion titulo de la pagina-->

@section('content')                    <!-- Inicio de contenido-->
	
	@include('admin.template.partials.errors')             <!-- Revisar errores ventana-->
	{!! Form::model($downloads, ['route' => ['admin.downloads.update',$downloads->id],'method' => 'PUT']) !!}      <!-- Inicio formulario para modificar la descarga-->
		@include('admin.template.partials.fieldsdownload')     <!-- Traer campos de descarga-->
		<div class="form-group">           <!-- Estructura de formulario-->
			<center>
			{!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}     <!-- Boton para editar la descarga-->
			<a href="{{ route('admin.downloads.index') }}" class="btn btn btn-primary" title="Cancelar modificación" name="Cancelar">Cancelar</a>     <!-- Enlace para cancelar la modificacion de descarga-->
			</center>
		</div>
	{!! Form::close() !!}   <!-- Fin de formulario-->
	
@endsection    <!-- Fin de contenido-->