@extends('layouts.app')               <!--Extender las herramientas que se utilizan en todas las ventanas-->

@section('title', 'Registrar ova')          <!-- Seccion titulo de la pagina-->

@section('content')                 <!-- Inicio de contenido-->

	@include('admin.template.partials.errors')                <!-- Revisar errores ventana-->
	{!! Form::open(['route' => 'admin.ovas.store','method' => 'POST', 'files' => true]) !!}     <!-- Formulario para ingresar un nuevo ova-->
		@include('admin.template.partials.fieldsova', ['routes' => 'create'])    <!-- Traer campos ova-->
		<div class="form-group">
			<h3>{!! Form::label('state','Estado',['class' => 'label label-primary']) !!}</h3>        <!-- Etqueta de estado ova-->
			{!! Form::select('state', [ false => 'Solicitud', true => 'Subido'], null, ['class' => 'form-control select-state','required']) !!}    <!-- Selector de estado del ova-->
		</div>
		<div class="form-group">
			<center>
			{!! Form::submit('Registrar',['class' => 'btn btn-warning']) !!}               <!-- Boton para registrar el ova-->
			<a href="{{ route('admin.ovas.index') }}" class="btn btn btn-warning" title="Cancelar registro" name="Cancelar">Cancelar</a>        <!-- Enlace para cancelar el registro de ova-->
			</center>
		</div>
	{!! Form::close() !!}         <!-- Fin de ciclo-->
	
@endsection            <!-- Fin de contenido-->

@section('js')         <!-- Incio contenido-->

	<script>
		$('.select-types').chosen({                     //Seleccion de tipos de ovas
			placeholder_text_single: 'Seleccione el tipo adecuado';
			no_results_text: 'No se encontro este tipo';
		});
		$('.select-categories').chosen({                       //Seleccion de categorias de ovas
			placeholder_text_single: 'Seleccione el categoria adecuado';
			no_results_text: 'No se encontro este categoria';
		});
	</script>
	
@endsection             <!-- Fin de contenido-->