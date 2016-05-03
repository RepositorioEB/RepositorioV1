@extends('layouts.app')

@section('title', 'Registrar problema')

@section('content')

	@include('admin.template.partials.errors')
	{!! Form::open(['route' => 'member.problems.store','method' => 'POST']) !!} <!-- Formuario para crear un nuevo problema-->
		<div class="form-group">
		<h3>{!! Form::label('name','Nombre',['class'=>'label label-primary']) !!}</h3> 
			{!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Nombre completo (Minimo 5 caracteres)']) !!}   <!-- Campo para ingresar el nombre del problema-->
		</div>
		<div class="form-group">
		<h3>{!! Form::label('description','Descripción',['class'=>'label label-primary']) !!}</h3>
			{!! Form::textarea('description', null, ['class' => 'form-control','placeholder' => 'Descripción (Minimo 20 caracteres)']) !!} <!-- Campo para ingresar la descripcion del problema-->
		</div>
		<div class="form-group">
			<center>
			{!! Form::submit('Registrar',['class' => 'btn btn-warning']) !!}    <!-- Boton para registrar el problema-->
			<a href="{{ route('admin.problems.index') }}" class="btn btn btn-warning" title="Cancelar problema" name="Cancelar">Cancelar</a>          <!-- Enlace para cancelar el registro de problema-->
			</center>
		</div>
	{!! Form::close() !!}
@endsection