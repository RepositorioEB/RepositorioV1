@extends('layouts.app')

@section('title', 'Editar ova '.$ovas->name)

@section('content')
	
	@include('admin.template.partials.errors')
	{!! Form::model($ovas, ['route' => ['admin.ovas.update',$ovas->id],'method' => 'PUT', 'files' => true]) !!}
		@include('admin.template.partials.fieldsova')
		<div class="form-group">
			{!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
	
@endsection