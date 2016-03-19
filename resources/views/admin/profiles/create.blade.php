@extends('layouts.app')

@section('title', 'Crear discapacidad')

@section('content')

	@include('admin.template.partials.errors')
	{!! Form::open(['route' => 'admin.profiles.store','method' => 'POST']) !!}
		@include('admin.template.partials.fieldsprofile')
		<div class="form-group">
			{!! Form::submit('Registrar',['class' => 'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
	
@endsection