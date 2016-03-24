@extends('layouts.app')

@section('title', 'Lista de tipos de ovas')

@section('content')
	
	@include('admin.template.partials.errors')
		<br />
		<h3>Busqueda por: <label class="label label-info">Categoria</label></h3>
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