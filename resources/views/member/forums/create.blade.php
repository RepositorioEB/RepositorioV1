@extends('layouts.app')

@section('title', 'Registrar foro')

@section('content')

	@include('admin.template.partials.errors')
	{!! Form::open(['route' => 'member.forums.store','method' => 'POST']) !!}  <!--Formulario para ingresar un nuevo foro -->
		@include('member.template.partials.fieldsforum')   <!-- Traer campos de foro-->
		<center>
		<div class="form-group">
			{!! Form::submit('Crear',['title'=>'Crear foro','class' => 'btn btn-warning']) !!}   <!-- Boton para crear el nuevo foro-->
			<a href="{{ route('foro.foros_usuarios.index') }}" class="btn btn btn-warning" title="Cancelar registro foro" name="Cancelar">Cancelar</a>  <!-- Enlace para cancelar la creacion de foro-->
		</div>
		</center>
	{!! Form::close() !!}
	
@endsection