@extends('layouts.app')

@section('title', 'Registrar tipo')

@section('content')

	@include('admin.template.partials.errors')
	{!! Form::open(['route' => 'admin.types.store','method' => 'POST']) !!}   <!-- Formulario para registrar nuevo tipo de ova-->
		@include('admin.template.partials.fieldstype')
		<div class="form-group">
			<center>
			{!! Form::submit('Registrar',['class' => 'btn btn-warning']) !!}   <!-- Boton para registrar tipo de ova-->
			<a href="{{ route('admin.types.index') }}" class="btn btn btn-warning" title="Cancelar registro" name="Cancelar">Cancelar</a>   <!--Enlace para cancelar registro de tipo de ova -->
			</center>
		</div>
	{!! Form::close() !!}
	
@endsection