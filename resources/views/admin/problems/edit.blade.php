@extends('layouts.app')

@section('title', 'Editar problema '.$problems->name)

@section('content')
	
	@include('admin.template.partials.errors')
	{!! Form::model($problems, ['route' => ['admin.problems.update',$problems->id],'method' => 'PUT']) !!}
		@include('admin.template.partials.fieldsproblem')
		<div class="form-group">
			{!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}
			<a href="{{ route('admin.problems.index') }}" class="btn btn btn-primary" title="Cancelar" name="Cancelar">Cancelar</a>
		</div>
	{!! Form::close() !!}
	
@endsection