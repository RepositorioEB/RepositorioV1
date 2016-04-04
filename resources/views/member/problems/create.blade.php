@extends('layouts.app')

@section('title', 'Registrar problema')

@section('content')

	@include('admin.template.partials.errors')
	{!! Form::open(['route' => 'member.problems.store','method' => 'POST']) !!}
		<div class="form-group">
		<h3>{!! Form::label('name','Nombre',['class'=>'label label-primary']) !!}</h3>
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
		<h3>{!! Form::label('description','Descripción',['class'=>'label label-primary']) !!}</h3>
			{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			<center>
			{!! Form::submit('Registrar',['class' => 'btn btn-warning']) !!}
			<a href="{{ route('admin.problems.index') }}" class="btn btn btn-warning" title="Cancelar problema" name="Cancelar">Cancelar</a>
			</center>
		</div>
	{!! Form::close() !!}
@endsection