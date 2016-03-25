@extends('layouts.app')

@section('title', 'Editar ova '.$ovas->name)

@section('content')
	
	@include('admin.template.partials.errors')
	{!! Form::model($ovas, ['route' => ['admin.ovas.update',$ovas->id],'method' => 'PUT']) !!}
		@include('admin.template.partials.fieldsova')
		<div class="form-group">
			{!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}
			<a href="{{ route('admin.ovas.index') }}" class="btn btn btn-primary" title="Cancelar" name="Cancelar">Cancelar</a>
		</div>
	{!! Form::close() !!}
	
@endsection