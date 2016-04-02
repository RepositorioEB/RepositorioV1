@extends('layouts.app')

@section('title', 'Editar categoria '.$categories->name)

@section('content')
	
	@include('admin.template.partials.errors')
	{!! Form::model($categories, ['route' => ['admin.categories.update',$categories->id],'method' => 'PUT']) !!}
		@include('admin.template.partials.fieldscategory')
		<div class="form-group">
			<center>
			{!! Form::submit('Editar',['class' => 'btn btn-warning']) !!}
			<a href="{{ route('admin.categories.index') }}" class="btn btn btn-warning" title="Cancelar modificación" name="Cancelar">Cancelar</a>
			</center>
		</div>
	{!! Form::close() !!}
	
@endsection