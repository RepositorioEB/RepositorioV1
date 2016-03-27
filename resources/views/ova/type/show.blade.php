@extends('layouts.app')

@section('title', 'Datos del ova ')

@section('content')

	@include('admin.template.partials.errors')
	<a href="{{ route('ovas.type.index') }}" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"> Volver</span></a>
	<center><label><h2>DATOS COMPLETOS DE CADA OVA</h2></label></center>
	{!! Form::open(['method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
		<h3><label>Buscar OVA: </label></h3>			
		<div class="input-group">
			{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar ova', 'aria-describedby' => 'search']) !!}
			<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
		</div>
	{!! Form::close() !!}
	<br><br><br><br><br>
	@foreach($ovas as $ova)
	<br>
	{!! Form::open( ['route' => ['ovas.ova.store'],'method' => 'POST', 'files' => true]) !!}
		@include('ova.fieldsova')
	{!! Form::close() !!}	
	{!! Form::open( ['route' => ['ovas.downloads.store','ova_id'=>$ova->id],'method' => 'POST', 'files' => true]) !!}		
	<div class="form-group">
		<h3>{!! Form::label('archive','Archivo',["class"=>"label label-primary"]) !!}
			<br><br>
			<center>
				{!! Form::text('archive', $ova->archive, ['class' => 'form-control','readonly'=>'readonly']) !!}
			</center>	
		</h3>
	</div>
	{!! Form::submit('Descargar',['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}
	<br>
	<div style="background: black; border: 1px solid #CCCCCC; padding: 4px;  border-radius: 13px; overflow-x: hidden;">
    </div>
	@endforeach
	<div class="text-center">
		@if(isset($_GET['name']))
			{!! $ovas->appends(array('name' => $_GET['name']))->links()!!}
		@else
			{!! $ovas->render() !!}
		@endif
	</div>
@endsection