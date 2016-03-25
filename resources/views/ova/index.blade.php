@extends('layouts.app')

@section('title', 'Lista de ovas')

@section('content')
	@include('admin.template.partials.errors')
	<a href="{{ route('ovas.ovamember.create') }}" class="btn btn-info">Registrar nuevo ova</a>
	{!! Form::open(['route' => 'ovas.ova.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
		<select class="form-control" id="sel1" name="select">
    		<option>Nombre</option>
    		<option>Tipo</option>
    		<option>Categoria</option>
  		</select>
		<div class="input-group">
			{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar ova', 'aria-describedby' => 'search']) !!}
			<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
		</div>
	{!! Form::close() !!}
	<br />
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Tipo</th>
			<th>Categoria</th>
			<th>Puntuación</th>
			<th>Accion</th>
		</thead>
		<tbody>
			@foreach($ovas as $ova)
				<tr>
					<td>{{ $ova->name }}</td>
					<td>{{ $ova->type->name }}</td>
					<td>{{ $ova->category->name }}</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $ova->punctuation}}</td>
					<td>
					    <a href="{{ route('ovas.ova.show', $ova->id) }}" class="btn btn-warning" title="Seleccionar"><span class="glyphicon glyphicon-ok" aria-hidden="true">Seleccionar</span></a>
    				</td>
				</tr>
			@endforeach
		</tbody>	
	</table>
	<div class="text-center">
		@if(isset($_GET['select']))
			{!! $ovas->appends(array('select' => $_GET['select'],'name' => $_GET['name']))->links()!!}
		@else
			{!! $ovas->render() !!}
		@endif
	</div>
@endsection