@extends('layouts.app')

@section('title', 'Registrar foro')

@section('content')

	@include('admin.template.partials.errors')
	{!! Form::open(['route' => 'admin.forums.store','method' => 'POST']) !!}
		@include('admin.template.partials.fieldsforum')
		<div class="form-group">
			<center>
			{!! Form::submit('Registrar',['class' => 'btn btn-warning']) !!}
			<a href="{{ route('admin.forums.index') }}" class="btn btn btn-warning" title="Cancelar registro" name="Cancelar">Cancelar</a>
			</center>
		</div>
	{!! Form::close() !!}
	
@endsection
