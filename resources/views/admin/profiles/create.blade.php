@extends('layouts.app')

@section('title', 'Registrar discapacidad')

@section('content')

	@include('admin.template.partials.errors')
	{!! Form::open(['route' => 'admin.profiles.store','method' => 'POST']) !!}
		@include('admin.template.partials.fieldsprofile')
		<div class="form-group">
			<center>
			{!! Form::submit('Registrar',['class' => 'btn btn-warning']) !!}
			<a href="{{ route('admin.profiles.index') }}" class="btn btn btn-warning" title="Cancelar registro" name="Cancelar">Cancelar</a>
			</center>
		</div>
	{!! Form::close() !!}
	
@endsection