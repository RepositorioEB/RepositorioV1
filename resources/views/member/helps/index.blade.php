@extends('layouts.app')

@section('title', 'Lista de ayudas')

@section('content')
	<div class="table-responsive">
	{!! Form::open(['route' => 'helps.helps', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}    <!-- Formulario para traer las ayudas registradas-->
			<label for="name">Buscar ayuda: </label>
			<div class="input-group">
				{!! Form::text('name', null, ['id'=>'name','title'=>'Ingresar ayuda','class' => 'form-control', 'placeholder' => 'Buscar ayuda', 'aria-describedby' => 'search']) !!}   <!-- Campo para ingresar la ayuda a buscar-->
				<span class="input-group-addon" id="search">
					<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
				</span>
			</div>
	{!! Form::close() !!}
	<br><br><br>
		@if(count($helps)>0)
		<table class="table table-striped">
			<thead>
				<th>Nombre</th>
				<th>Enlace</th>
				<th>Descripción</th>
				<th>Creador</th>
				<th>Acción</th>
			</thead>
			<tbody>
				@foreach($helps as $help)   <!-- Ciclo de ayudas-->
					<tr>
						<td>{{ $help->name }}</td>
						<td>{{ $help->video }}</td>
						<td>{!! $replace=str_replace("\r","<br>",$help->description); !!}</td>
						<td>{{ $help->user->name }}</td>
						<td>
							<a href="{{ route('helps.helps.show', $help->id) }}" class="btn btn-info" title="Consultar"><span class="glyphicon glyphicon-folder-open" aria-hidden="true">Visualizar</span></a>   <!-- Enlace para seleccionar la ayuda que desea consultar--> 
						</td>
					</tr>
				@endforeach
			</tbody>	
		</table>
	<div class="text-center">
		{!! $helps->render() !!}   <!-- Paginacion de las ayudas-->
	</div>
	@else
		<br><br>
		<h3><legend>&nbsp;&nbsp;&nbsp;No se encontró ningún elemento.</legend></h3>
	@endif
	
	</div>
@endsection