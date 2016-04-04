@extends('layouts.app')

@section('title', 'Registrar ayuda')

@section('content')

	@include('admin.template.partials.errors')
	{!! Form::open(['route' => 'admin.helps.store','method' => 'POST']) !!}
		@include('admin.template.partials.fieldshelp')
		<div class="form-group">
			<center>
			{!! Form::submit('Registrar',['class' => 'btn btn-warning']) !!}
			<a href="{{ route('admin.helps.index') }}" class="btn btn btn-warning" title="Cancelar registro" name="Cancelar">Cancelar</a>
			</center>
		</div>
	{!! Form::close() !!}
	
@endsection
