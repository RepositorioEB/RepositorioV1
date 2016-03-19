@extends('layouts.app')

@section('title', 'Editar discapacidad '.$profiles->name)

@section('content')
	
	@include('admin.template.partials.errors')
	{!! Form::model($profiles, ['route' => ['admin.profiles.update',$profiles->id],'method' => 'PUT']) !!}
		@include('admin.template.partials.fieldsprofile')
		<div class="form-group">
			{!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
	
@endsection