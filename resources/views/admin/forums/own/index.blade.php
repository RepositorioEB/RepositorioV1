@extends('layouts.app')

@section('title', 'Foros propios')

@section('content')

	@include('admin.template.partials.errors')
	<div class="table-responsive">
		<a href="{{ route('admin.forums.create') }}" class="btn btn-info">Registrar nuevo foro</a>
		<table class="table table-striped">
			<thead>
				<th>Nombre</th>
				<th>Características</th>
				<th>Acción</th>
			</thead>
			<tbody>
				@foreach($forums as $forum)
					@if($forum->user_id == Auth::user()->id)
					<tr>
						<td>{{ $forum->name }}</td>
						<td>{{ $forum->characteristic }}</td>
						<td>
							<a href="{{ route('admin.forums.edit', $forum->id) }}" class="btn btn-warning" title="Editar foro"><span class="glyphicon glyphicon-wrench" aria-hidden="true">Editar</span></a>
							<a href="{{ route('admin.forums.destroy', $forum->id) }}" onclick="return confirm('¿Seguro que quieres eliminarlo?')" class="btn btn-danger" title="Eliminar foro"><span class="glyphicon glyphicon-trash" aria-hidden="true">Eliminar</span></a>
						</td>
					</tr>
					@endif
				@endforeach
			</tbody>	
		</table>
	</div>
	<div class="text-center">
		{!! $forums->render() !!}
	</div>
@endsection