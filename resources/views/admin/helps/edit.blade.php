@extends('layouts.app')

@section('title', 'Editar ayuda '.$helps->name)

@section('content')
	
	@include('admin.template.partials.errors')
	{!! Form::model($helps, ['route' => ['admin.helps.update',$helps->id],'method' => 'PUT']) !!}
		@include('admin.template.partials.fieldshelp')
		<div class="form-group">
			<center>
			{!! Form::submit('Editar',['class' => 'btn btn-warning']) !!}
			<a href="{{ route('admin.helps.index') }}" class="btn btn btn-warning" title="Cancelar modificación" name="Cancelar">Cancelar</a>
			</center>
		</div>
	{!! Form::close() !!}
	
@endsection