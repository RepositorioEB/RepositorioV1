@extends('layouts.app')

@section('title', 'Lista tipos de ovas')

@section('content')
	
	@include('admin.template.partials.errors')
		<br />
		<a href="../ovas/menu" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"> Volver</span></a>
		<h3>Busqueda por: <label class="label label-info">Tipo</label></h3>
		<br />
		<center>
		@foreach($types as $type)
			<br />
				{!! Form::open(['route' =>['ovas.type.show', $type->id] , 'method' => 'GET']) !!}
					{!! Form::submit($type->name ,['class' => 'btn btn-primary']) !!}
				{!! Form::close() !!}
			<br />
		@endforeach
		</center>
@endsection