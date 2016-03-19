@extends('layouts.app')

@section('title', 'Crear categoria')

@section('content')

	@include('admin.template.partials.errors')
	{!! Form::open(['route' => 'admin.categories.store','method' => 'POST']) !!}
		@include('admin.template.partials.fieldscategory')
		<div class="form-group">
			{!! Form::submit('Registrar',['class' => 'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
	
@endsection