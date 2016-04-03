@extends('layouts.app')

@section('title', 'Crear problema')

@section('content')

	@include('admin.template.partials.errors')
	{!! Form::open(['route' => 'member.problems.store','method' => 'POST']) !!}
		<div class="form-group">
		<h3>{!! Form::label('description','Descripción',['class'=>'label label-primary']) !!}</h3>
			{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			<center>
			{!! Form::submit('Crear',['class' => 'btn btn-warning']) !!}
			<a href="{{ route('admin.problems.index') }}" class="btn btn btn-warning" title="Cancelar problema" name="Cancelar">Cancelar</a>
			</center>
		</div>
	{!! Form::close() !!}
@endsection