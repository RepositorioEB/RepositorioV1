@extends('layouts.app')

@section('title', 'Editar categoria '.$categories->name)

@section('content')
	
	@include('admin.template.partials.errors')
	{!! Form::model($categories, ['route' => ['admin.categories.update',$categories->id],'method' => 'PUT']) !!}
		@include('admin.template.partials.fieldscategory')
		<div class="form-group">
			{!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
	
@endsection