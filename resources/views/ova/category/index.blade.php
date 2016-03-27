@extends('layouts.app')

@section('title', 'Lista categoria de ovas')

@section('content')
	
	@include('admin.template.partials.errors')
		<br />
		<a href="../ovas/menu" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"> Volver</span></a>
		<h3>Búsqueda por: <label class="label label-primary">Categoria</label></h3>
		<br />
		<center>
		@foreach($categories as $category)
			<br />
				{!! Form::open(['route' =>['ovas.category.show', $category->id] , 'method' => 'GET']) !!}
					{!! Form::submit($category->name ,['class' => 'btn btn-primary']) !!}
				{!! Form::close() !!}
			<br />
		@endforeach
		</center>
@endsection