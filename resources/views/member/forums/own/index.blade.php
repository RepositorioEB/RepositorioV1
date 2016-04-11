@extends('layouts.app')

@section('title', 'Foros propios')

@section('content')

	@include('admin.template.partials.errors')
	<div class="table-responsive">
		<a href="{{ route('member.forums.create') }}" class="btn btn-info">Registrar nuevo foro</a> <!-- Enlace para registrar un nuevo foro-->
		<table class="table table-striped">
			<thead>
				<th>Nombre</th>
				<th>Caracteristicas</th>
			</thead>
			<tbody>
				@foreach($forums as $forum) <!-- Ciclo de foros-->
					@if($forum->user_id == Auth::user()->id)   <!-- Buscar los foros con el id del usuario-->
					<tr>
						<td>{{ $forum->name }}</td>
						<td>{{ $forum->characteristic }}</td>
					</tr>
					@endif
				@endforeach
			</tbody>	
		</table>
	</div>
	<div class="text-center">
		{!! $forums->render() !!}        <!-- Paginacion de foros-->
	</div>
	
@endsection