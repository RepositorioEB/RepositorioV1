@extends('layouts.app')

@section('title', 'Crear foro')

@section('content')

	@include('admin.template.partials.errors')
	{!! Form::open(['route' => 'member.forums.store','method' => 'POST']) !!}
		@include('member.template.partials.fieldsforum')
		<center>
		<div class="form-group">
			{!! Form::submit('Crear',['title'=>'Crear foro','class' => 'btn btn-warning']) !!}
			<a href="{{ route('foro.foros_usuarios.index') }}" class="btn btn btn-warning" title="Cancelar registro foro" name="Cancelar">Cancelar</a>
		</div>
		</center>
	{!! Form::close() !!}
	
@endsection