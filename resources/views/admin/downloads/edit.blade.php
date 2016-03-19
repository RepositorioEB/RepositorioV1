@extends('layouts.app')

@section('title', 'Editar descarga '.$downloads->name)

@section('content')
	
	@include('admin.template.partials.errors')
	{!! Form::model($downloads, ['route' => ['admin.downloads.update',$downloads->id],'method' => 'PUT']) !!}
		@include('admin.template.partials.fieldsdownload')
		<div class="form-group">
			{!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
	
@endsection