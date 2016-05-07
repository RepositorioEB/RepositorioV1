@extends('layouts.app')

@section('title', 'Datos del ova ')

@section('content')

	@include('admin.template.partials.errors')
	<!-- Enlace para volver a la pagina con los tipos de ovas-->
	<a href="{{ route('ovas.type.index') }}" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"> Volver</span></a>
	<center><legend><h2>DATOS COMPLETOS DE CADA OVA</h2></legend></center>
	{!! Form::open(['method' => 'GET', 'class' => 'navbar-form pull-right']) !!}      <!-- Formulario para consultar tipos de ova segun el nombre-->
		<h3><label for="nameOva">Buscar OVA: </label></h3>			
		<div class="input-group">
			<!-- Campo para ingresar el nombre de ova a consultar que cumplan con el tipo-->
			{!! Form::text('nameOva', null, ['id' => 'nameOva','class' => 'form-control', 'placeholder' => 'Buscar ova', 'aria-describedby' => 'search']) !!}
			<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
		</div>
	{!! Form::close() !!}
	<br><br><br><br><br>
	@if(count($ovas)>0)
	@foreach($ovas as $ova)    <!-- Ciclo ovas-->
	<br>
	{!! Form::open( ['route' => ['ovas.ova.store'],'method' => 'POST', 'files' => true]) !!}        <!-- Formulario para mostrar los ovas-->
		@include('ova.fieldsova')   <!-- Mostrar campo de ovas-->
	{!! Form::close() !!}	
	{!! Form::open( ['route' => ['ovas.downloads.store','ova_id'=>$ova->id],'method' => 'POST', 'files' => true]) !!}	<!-- Formulario para descargar ova-->	
	<div class="form-group">
		<h3>{!! Form::label('archive'.$ova->id,'Archivo',["for"=>"archive","class"=>"label label-primary"]) !!}
			<br><br>
			<center>
				<!-- Campo de texto para mostrar el archivo-->
				{!! Form::text('archive', $ova->archive, ['id'=>'archive'.$ova->id,'class' => 'form-control','readonly'=>'readonly']) !!}
			</center>	
		</h3>
	</div>
	{!! Form::submit('Descargar',['class' => 'btn btn-warning']) !!}    <!-- Boton para descargar el archivo-->
	{!! Form::close() !!}
	<br>
	<!-- Mostrar linea de separacion de ovas-->
	<div style="background: black; border: 1px solid #CCCCCC; padding: 4px;  border-radius: 13px; overflow-x: hidden;">
    </div>
	@endforeach
	<div class="text-center">
		@if(isset($_GET['name']))    
			{!! $ovas->appends(array('name' => $_GET['name']))->links()!!}   <!-- Paginacion de tipos con parametro segun el nombre de ova-->
		@else
			{!! $ovas->render() !!}   <!-- Paginacion de tipos de ova-->
		@endif
	</div>
	@else
		<h3><legend>&nbsp;&nbsp;&nbsp;No se encontró ningún elemento.</legend></h3>	
	@endif
@endsection