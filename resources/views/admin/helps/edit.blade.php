@extends('layouts.app')

@section('title', 'Editar ayuda '.$helps->name)

@section('content')
	
	@include('admin.template.partials.errors')
	{!! Form::model($helps, ['route' => ['admin.helps.update',$helps->id],'method' => 'PUT']) !!}
		@include('admin.template.partials.fieldshelp')
		<div class="form-group">
			{!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}
			<a href="{{ route('admin.helps.index') }}" class="btn btn btn-primary" title="Cancelar" name="Cancelar">Cancelar</a>
		</div>
	{!! Form::close() !!}
	
@endsection