@extends('layouts.app')

@section('title', 'Lista de ayudas')

@section('content')
	<div class="table-responsive">
	{!! Form::open(['route' => 'helps.helps', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
			<label for="name">Buscar ayuda: </label>
			<div class="input-group">
				{!! Form::text('name', null, ['id'=>'name','title'=>'Ingresar foro','class' => 'form-control', 'placeholder' => 'Buscar ayuda', 'aria-describedby' => 'search']) !!}
				<span class="input-group-addon" id="search">
					<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
				</span>
			</div>
	{!! Form::close() !!}
	<br><br><br>
		<table class="table table-striped">
			<thead>
				<th>Nombre</th>
				<th>Enlace</th>
				<th>Descripción</th>
				<th>Creador</th>
				<th>Acción</th>
			</thead>
			<tbody>
				@foreach($helps as $help)
					<tr>
						<td>{{ $help->name }}</td>
						<td>{{ $help->video }}</td>
						<td>{{ $help->description }}</td>
						<td>{{ $help->user->name }}</td>
						<td>
							<a href="{{ route('helps.helps.show', $help->id) }}" class="btn btn-info" title="Consultar"><span class="glyphicon glyphicon-folder-open" aria-hidden="true">Visualizar</span></a>
						</td>
					</tr>
				@endforeach
			</tbody>	
		</table>
	<div class="text-center">
		{!! $helps->render() !!}
	</div>
	</div>
@endsection