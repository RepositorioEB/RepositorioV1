@extends('layouts.app')

@section('title', 'Crear tipo')

@section('content')

	@include('admin.template.partials.errors')
	{!! Form::open(['route' => 'admin.types.store','method' => 'POST']) !!}
		@include('admin.template.partials.fieldstype')
		<div class="form-group">
			{!! Form::submit('Registrar',['class' => 'btn btn-primary']) !!}
			<a href="{{ route('admin.types.index') }}" class="btn btn btn-primary" title="Cancelar" name="Cancelar">Cancelar</a>
		</div>
	{!! Form::close() !!}
	
@endsection