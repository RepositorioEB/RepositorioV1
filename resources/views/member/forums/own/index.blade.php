@extends('layouts.app')

@section('title', 'Foros propios')

@section('content')

	@include('admin.template.partials.errors')
	<div class="table-responsive">
		<a href="{{ route('member.forums.create') }}" class="btn btn-info">Registrar nuevo foro</a>
		<table class="table table-striped">
			<thead>
				<th>Nombre</th>
				<th>Caracteristicas</th>
			</thead>
			<tbody>
				@foreach($forums as $forum)
					@if($forum->user_id == Auth::user()->id)
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
		{!! $forums->render() !!}
	</div>
	
@endsection