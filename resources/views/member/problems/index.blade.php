@extends('layouts.app')

@section('title', 'Lista de problemas')

@section('content')

	@include('admin.template.partials.errors')
	<div class="table-responsive">
		<a href="{{ route('member.problems.create') }}" class="btn btn-info">Registrar nuevo problema</a>
		<table class="table table-striped">
			<thead>
				<th>Descripcion</th>
				<th>Estado</th>
			</thead>
			<tbody>
				@foreach($problems as $problem)
					@if($problem->user_id == Auth::user()->id)
						<tr>
						<td>{{ $problem->description }}</td>
						@if($problem->state == 0)
							<td><h4><span class="label label-primary">Sin resolver</span></h4></td>
						@else
							<td><h4><span class="label label-danger">Resuelto</span></h4></td>
						@endif
						</tr>
					@endif
				@endforeach
			</tbody>	
		</table>
	</div>
	<div class="text-center">
		{!! $problems->render() !!}
	</div>
	
@endsection