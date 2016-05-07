@extends('layouts.app')

@section('title', 'Datos de los ovas')

@section('content')

	@include('admin.template.partials.errors')
	<a href="{{ route('ovas.category.index') }}" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"> Volver</span></a>  <!-- Enlace para volver a la lista de categorias de ovas-->
	<center><legend><h2>DATOS COMPLETOS DE CADA OVA</h2></legend></center>
	{!! Form::open([ 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}      <!-- Forumulario para traer ovas con el nombre ingresado-->
		<h3><label for="nameOva">Buscar OVA: </label></h3>			
		<div class="input-group">
			{!! Form::text('nameOva', null, ['id'=>'nameOva','class' => 'form-control', 'placeholder' => 'Buscar ova', 'aria-describedby' => 'search']) !!}         <!-- Campo para ingresar el nombre del ova a buscar-->
			<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
		</div>
	{!! Form::close() !!}
	<br><br><br><br><br>
	@if(count($ovas)>0)
	@foreach($ovas as $ova)    <!-- Ciclo ovas-->
	<br>
	{!! Form::open( ['route' => ['ovas.ova.store'],'method' => 'POST', 'files' => true]) !!}      <!-- Formulario para traer campos de ova-->
		@include('ova.fieldsova')     <!-- Mostrar campos de ova-->
	{!! Form::close() !!}	
	{!! Form::open( ['route' => ['ovas.downloads.store','ova_id'=>$ova->id],'method' => 'POST', 'files' => true]) !!}	   <!-- Formulario para crear la descarga del ova-->	
	<div class="form-group">
		<h3>{!! Form::label('archive'.$ova->id,'Archivo',["for"=>"archive".$ova->id,"class"=>"label label-primary"]) !!}
			<br><br>
			<center>
				<!-- Campo para mostrar el archivo del ova a descargar-->
				{!! Form::text('archive'.$ova->id, $ova->archive, ["id"=>"archive".$ova->id ,'class' => 'form-control','readonly'=>'readonly']) !!}
			</center>	
		</h3>
	</div>
	{!! Form::submit('Descargar',['class' => 'btn btn-warning']) !!}  <!-- Boton para descargar el ova-->
	{!! Form::close() !!}
	<br>
	<!-- Mostrar linea de separacion de ovas-->
	<div style="background: black; border: 1px solid #CCCCCC; padding: 4px;  border-radius: 13px; overflow-x: hidden;">
    </div>
    @endforeach
    <div class="text-center">
		@if(isset($_GET['name']))
			{!! $ovas->appends(array('name' => $_GET['name']))->links()!!}         <!-- Paginacion de ovas-->
		@else
			{!! $ovas->render() !!}
		@endif
	</div>
	@else
		<h3><legend>&nbsp;&nbsp;&nbsp;No se encontró ningún elemento.</legend></h3>	
	@endif
@endsection