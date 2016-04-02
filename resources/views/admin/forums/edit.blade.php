@extends('layouts.app')

@section('title', 'Editar foro '.$forums->name)

@section('content')
	
	@include('admin.template.partials.errors')
	{!! Form::model($forums, ['route' => ['admin.forums.update',$forums->id],'method' => 'PUT']) !!}
		@include('admin.template.partials.fieldsforum')
		<div class="form-group">
			<center>
			{!! Form::submit('Editar',['class' => 'btn btn-warning']) !!}
			<a href="{{ route('admin.forums.index') }}" class="btn btn btn-warning" title="Cancelar modificación" name="Cancelar">Cancelar</a>
			</center>
		</div>
	{!! Form::close() !!}
	
@endsection