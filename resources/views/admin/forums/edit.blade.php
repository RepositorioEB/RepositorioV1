@extends('layouts.app')

@section('title', 'Editar foro '.$forums->name)

@section('content')
	
	@include('admin.template.partials.errors')
	{!! Form::model($forums, ['route' => ['admin.forums.update',$forums->id],'method' => 'PUT']) !!}
		@include('admin.template.partials.fieldsforum')
		<div class="form-group">
			{!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}
			<a href="{{ route('admin.forums.index') }}" class="btn btn btn-primary" title="Cancelar" name="Cancelar">Cancelar</a>
		</div>
	{!! Form::close() !!}
	
@endsection