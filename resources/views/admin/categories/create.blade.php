@extends('layouts.app')

@section('title', 'Crear categoria')

@section('content')

	@include('admin.template.partials.errors')
	{!! Form::open(['route' => 'admin.categories.store','method' => 'POST']) !!}
		@include('admin.template.partials.fieldscategory')
		<div class="form-group">
			<center>
			{!! Form::submit('Registrar',['class' => 'btn btn-warning']) !!}
			<a href="{{ route('admin.categories.index') }}" class="btn btn btn-warning" title="Cancelar registro" name="Cancelar">Cancelar</a>
			</center>
		</div>
	{!! Form::close() !!}
	
@endsection