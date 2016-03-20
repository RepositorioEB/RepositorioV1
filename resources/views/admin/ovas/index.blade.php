@extends('layouts.app')

@section('title', 'Lista de ovas')

@section('content')

	@include('admin.template.partials.errors')
	<a href="{{ route('admin.ovas.create') }}" class="btn btn-info">Registrar nuevo ova</a>
	{!! Form::open(['route' => 'admin.ovas.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
		<div class="input-group">
			{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar ova', 'aria-describedby' => 'search']) !!}
			<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
		</div>
	{!! Form::close() !!}
	<br />
	<table class="table table-striped">
		<thead>
			<th>Id</th>
			<th>Nombre</th>
			<th>Puntuacion</th>
			<th>Tipo</th>
			<th>Categoria</th>
			<th>Accion</th>
		</thead>
		<tbody>
			@foreach($ovas as $ova)
				<tr>
					<td>{{ $ova->id }}</td>
					<td>{{ $ova->name }}</td>
					<td>{{ $ova->punctuation }}</td>
					<td>{{ $ova->type->name }}</td>
					<td>{{ $ova->category->name }}</td>
					<td>
						<a href="{{ route('admin.ovas.edit', $ova->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
						<a href="{{ route('admin.ovas.destroy', $ova->id) }}" onclick="return confirm('¿Seguro que quieres eliminarlo?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
					</td>
				</tr>
			@endforeach
		</tbody>	
	</table>
	<div class="text-center">
		{!! $ovas->render() !!}
	</div>
	
@endsection