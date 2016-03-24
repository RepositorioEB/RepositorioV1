@extends('layouts.app')

@section('title', 'Editar categoria '.$categories->name)

@section('content')
	
	@include('admin.template.partials.errors')
	{!! Form::model($categories, ['route' => ['admin.categories.update',$categories->id],'method' => 'PUT']) !!}
		@include('admin.template.partials.fieldscategory')
		<div class="form-group">
			{!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}
			<a href="{{ route('admin.categories.index') }}" class="btn btn btn-primary" title="Cancelar" name="Cancelar">Cancelar</a>
		</div>
	{!! Form::close() !!}
	
@endsection