@extends('layouts.app')

@section('title', 'Crear ayuda')

@section('content')

	@include('admin.template.partials.errors')
	{!! Form::open(['route' => 'admin.helps.store','method' => 'POST']) !!}
		@include('admin.template.partials.fieldshelp')
		<div class="form-group">
			{!! Form::submit('Crear',['class' => 'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
	
@endsection
