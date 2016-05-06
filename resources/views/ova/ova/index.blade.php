@extends('layouts.app')

@section('title', 'Datos del ova ')

@section('content')

	@include('admin.template.partials.errors')
	<a href="../ovas/menu" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"> Volver</span></a>  <!-- Enlace para volver al menu de ovas -->
	<center><legend><h2>DATOS COMPLETOS DE CADA OVA</h2></legend></center>
	{!! Form::open([ 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}   <!-- Formulario para traer los ovas segun la consulta-->
		<h3><label for="nameOva" >Buscar OVA: </label></h3>			
		<div class="input-group">
			{!! Form::text('name', null, ['id'=>'nameOva','title'=>'Buscar OVA','class' => 'form-control', 'placeholder' => 'Buscar ova', 'aria-describedby' => 'search']) !!}    <!-- Campo para ingresar el ova a consultar-->
			<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
		</div>
	{!! Form::close() !!}
	<br><br><br><br><br>
	@if(count($ovas)==0)
		<br><br>
		<h3><legend>&nbsp;&nbsp;&nbsp;No se encontró ningún elemento.</legend></h3>
	@endif
	@foreach($ovas as $ova)    <!-- Ciclo de ovas-->
	<br>
	{!! Form::open( ['route' => ['ovas.ova.store'],'method' => 'POST', 'files' => true]) !!}    <!-- Formulario para traer campos de ova-->
		@include('ova.fieldsova')   <!-- Mostrar campos ova-->
	{!! Form::close() !!}	
	{!! Form::open( ['route' => ['ovas.downloads.store','ova_id'=>$ova->id],'method' => 'POST', 'files' => true]) !!}		<!-- Formulario para crear descarga-->
	<div class="form-group">
		<h3>{!! Form::label('archive'.$ova->id,'Archivo',["for"=>"archive".$ova->id,"class"=>"label label-primary"]) !!}
			<br><br>
			<center>
				{!! Form::text('archive', $ova->archive, ["id"=>"archive".$ova->id,'class' => 'form-control','readonly'=>'readonly']) !!}   <!-- Campo con el nombre de descarga-->
			</center>	
		</h3>
	</div>
	{!! Form::submit('Descargar',['class' => 'btn btn-warning']) !!}           <!-- Boton para descargar el ova-->
	{!! Form::close() !!}
	<br>
	<div style="background: black; border: 1px solid #CCCCCC; padding: 4px;  border-radius: 13px; overflow-x: hidden;">  <!-- Mostrar linea de separacion de ovas-->
    </div>
	@endforeach	
	<div class="text-center">
		@if(isset($_GET['name']))
			{!! $ovas->appends(array('name' => $_GET['name']))->links()!!}  <!-- Paginacion de los ovas segun el nombre-->
		@else
			{!! $ovas->render() !!}     <!--Paginacion de ovas -->
		@endif
	</div>
@endsection