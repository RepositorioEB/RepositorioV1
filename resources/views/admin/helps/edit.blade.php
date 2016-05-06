@extends('layouts.app')          <!--Extender las herramientas que se utilizan en todas las ventanas-->

@section('title', 'Editar ayuda '.$helps->name)         <!-- Seccion titulo de la pagina-->

@section('content')                        <!-- Inicio de contenido-->
	
	@include('admin.template.partials.errors')                      <!-- Revisar errores ventana-->
	{!! Form::model($helps, ['route' => ['admin.helps.update',$helps->id],'method' => 'PUT', 'files' => true]) !!}          <!-- Inicio de formulario para modificar la ayuda-->
		@include('admin.template.partials.fieldshelp')    <!-- Traer campos ayuda-->
		<div class="form-group">   <!-- Estructura de formualrio-->
			<center>
			{!! Form::submit('Editar',['class' => 'btn btn-warning']) !!}           <!-- Boton para realizar la modificacion-->
			<a href="{{ route('admin.helps.index') }}" class="btn btn btn-warning" title="Cancelar modificación" name="Cancelar">Cancelar</a>          <!-- Enlace para cancelar la modificacion-->
			</center>
		</div>
	{!! Form::close() !!}    <!-- Fin de formulario-->
	
@endsection              <!-- Fin de contenido-->