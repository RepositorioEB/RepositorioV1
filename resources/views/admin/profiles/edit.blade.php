@extends('layouts.app')

@section('title', 'Editar discapacidad '.$profiles->name)

@section('content')
	
	@include('admin.template.partials.errors')
	{!! Form::model($profiles, ['route' => ['admin.profiles.update',$profiles->id],'method' => 'PUT']) !!}
		@include('admin.template.partials.fieldsprofile')
		<div class="form-group">
			<center>
				{!! Form::submit('Editar',['class' => 'btn btn-warning']) !!}
				<a href="{{ route('admin.profiles.index') }}" class="btn btn btn-warning" title="Cancelar" name="Cancelar">Cancelar</a>
			</center>
		</div>
	{!! Form::close() !!}
	
@endsection