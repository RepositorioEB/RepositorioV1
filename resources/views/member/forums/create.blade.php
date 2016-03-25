@extends('layouts.app')

@section('title', 'Crear foro')

@section('content')

	@include('admin.template.partials.errors')
	{!! Form::open(['route' => 'member.forums.store','method' => 'POST']) !!}
		@include('member.template.partials.fieldsforum')
		<div class="form-group">
			{!! Form::submit('Crear',['class' => 'btn btn-primary']) !!}
			<a href="{{ route('foro.foros_usuarios.index') }}" class="btn btn btn-primary" title="Cancelar" name="Cancelar">Cancelar</a>
		</div>
	{!! Form::close() !!}
	
@endsection