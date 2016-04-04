@extends('layouts.app')

@section('title', 'Registrar tipo')

@section('content')

	@include('admin.template.partials.errors')
	{!! Form::open(['route' => 'admin.types.store','method' => 'POST']) !!}
		@include('admin.template.partials.fieldstype')
		<div class="form-group">
			<center>
			{!! Form::submit('Registrar',['class' => 'btn btn-warning']) !!}
			<a href="{{ route('admin.types.index') }}" class="btn btn btn-warning" title="Cancelar registro" name="Cancelar">Cancelar</a>
			</center>
		</div>
	{!! Form::close() !!}
	
@endsection