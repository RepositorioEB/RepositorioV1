@extends('layouts.app')

@section('title', 'Lista de ayudas')

@section('content')
	
	<div class="table-responsive">
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
	</div>
	<div class="text-center">
		{!! $helps->render() !!}
	</div>
@endsection