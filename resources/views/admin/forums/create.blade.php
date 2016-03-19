@extends('layouts.app')

@section('title', 'Crear foro')

@section('content')

	@include('admin.template.partials.errors')
	{!! Form::open(['route' => 'admin.forums.store','method' => 'POST']) !!}
		@include('admin.template.partials.fieldsforum')
		<div class="form-group">
			{!! Form::submit('Crear',['class' => 'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
	
@endsection
