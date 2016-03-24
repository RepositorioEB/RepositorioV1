@extends('layouts.app')

@section('title', 'Crear foro')

@section('content')

	@include('admin.template.partials.errors')
	{!! Form::open(['route' => 'admin.forums.store','method' => 'POST']) !!}
		@include('admin.template.partials.fieldsforum')
		<div class="form-group">
			{!! Form::submit('Crear',['class' => 'btn btn-primary']) !!}
			<a href="{{ route('admin.forums.index') }}" class="btn btn btn-primary" title="Cancelar" name="Cancelar">Cancelar</a>
		</div>
	{!! Form::close() !!}
	
@endsection
