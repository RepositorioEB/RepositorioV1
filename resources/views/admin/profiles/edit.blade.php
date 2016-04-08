@extends('layouts.app')

@section('title', 'Editar discapacidad '.$profiles->name)

@section('content')
	
	@include('admin.template.partials.errors')
	{!! Form::model($profiles, ['route' => ['admin.profiles.update',$profiles->id],'method' => 'PUT']) !!}   <!-- Formulario para modificar perfil-->
		@include('admin.template.partials.fieldsprofile')   <!-- Traer campos perfil-->
		<div class="form-group">
			<center>
				{!! Form::submit('Editar',['class' => 'btn btn-warning']) !!}   <!-- Boton modificar perfil-->
				<a href="{{ route('admin.profiles.index') }}" class="btn btn btn-warning" title="Cancelar" name="Cancelar">Cancelar</a>   <!-- Enlace cancelar modificacion-->
			</center>
		</div>
	{!! Form::close() !!}
	
@endsection