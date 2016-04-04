@extends('layouts.app')

@section('title', 'Ovas propios')

@section('content')
	
	@include('admin.template.partials.errors')
	<div class="table-responsive">
	<a href="{{ route('ovas.ovamember.create') }}" class="btn btn-info">Registrar nuevo ova</a>
	<br><br><br>
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Tipo</th>
			<th>Categoría</th>
			<th>Puntuación</th>
			<th>Estado</th>
		</thead>
		<tbody>
			@foreach($ovas as $ova)
				@if($ova->user_id == Auth::user()->id)
				<tr>
					<td>{{ $ova->name }}</td>
					<td>{{ $ova->type->name }}</td>
					<td>{{ $ova->category->name }}</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $ova->punctuation}}</td>
					<td>
							@if ($ova->state)
								<h4><span class="label label-danger">{{ 'Subido' }}</span></h4>
							@else
								<h4><span class="label label-primary">{{ 'Solicitud' }}</span></h4>
							@endif
					</td>	
				</tr>
				@endif
			@endforeach
		</tbody>	
	</table>
	<div class="text-center">
		{!! $ovas->render() !!}
	</div>
	</div>
@endsection