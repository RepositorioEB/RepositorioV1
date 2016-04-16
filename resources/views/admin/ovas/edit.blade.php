@extends('layouts.app') 

@section('title', 'Editar ova '.$ovas->name)

@section('content')
	
	@include('admin.template.partials.errors')
	{!! Form::model($ovas, ['route' => ['admin.ovas.update',$ovas->id],'method' => 'PUT', 'files' => true]) !!}   <!-- Formulario para modificar los ovas-->
		@include('admin.template.partials.fieldsova', ['routes' => 'edit'])   <!-- Traer campos ova-->
		<div class="form-group">
			<h3>{!! Form::label('state','Estado',['class'=>'label label-primary']) !!}</h3>
			{!! Form::select('state', [ false => 'Solicitud', true => 'Subido'], null, ['class' => 'form-control select-state','required']) !!}   <!-- Seleccionar el estado del ova-->
		</div>
		<div class="form-group">
			<center>
			{!! Form::submit('Editar',['class' => 'btn btn-warning']) !!}       <!-- Boton editar ova-->  
			<a href="{{ route('admin.ovas.index') }}" class="btn btn btn-warning" title="Cancelar modificación" name="Cancelar">Cancelar</a>  <!-- Enlace cancelar modificacio-->
			</center>
		</div>
	{!! Form::close() !!}
	
@endsection