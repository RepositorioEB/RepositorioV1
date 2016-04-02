@extends('layouts.app')

@section('title', 'Editar ova '.$ovas->name)

@section('content')
	
	@include('admin.template.partials.errors')
	{!! Form::model($ovas, ['route' => ['admin.ovas.update',$ovas->id],'method' => 'PUT', 'files' => true]) !!}
		@include('admin.template.partials.fieldsova')
		<div class="form-group">
			<h3>{!! Form::label('state','Estado',['class'=>'label label-primary']) !!}</h3>
			{!! Form::select('state', [ false => 'Solicitud', true => 'Subido'], null, ['class' => 'form-control select-state','required']) !!}
		</div>
		<div class="form-group">
			<center>
			{!! Form::submit('Editar',['class' => 'btn btn-warning']) !!}
			<a href="{{ route('admin.ovas.index') }}" class="btn btn btn-warning" title="Cancelar modificación" name="Cancelar">Cancelar</a>
			</center>
		</div>
	{!! Form::close() !!}
	
@endsection