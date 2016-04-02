@extends('layouts.app')

@section('title', 'Editar problema '.$problems->name)

@section('content')
	
	@include('admin.template.partials.errors')
	{!! Form::model($problems, ['route' => ['admin.problems.update',$problems->id],'method' => 'PUT']) !!}
		@include('admin.template.partials.fieldsproblem')
		<div class="form-group">
			<center>
			{!! Form::submit('Editar',['class' => 'btn btn-warning']) !!}
			<a href="{{ route('admin.problems.index') }}" class="btn btn btn-warning" title="Cancelar modificación" name="Cancelar">Cancelar</a>
			</center>
		</div>
	{!! Form::close() !!}
	
@endsection