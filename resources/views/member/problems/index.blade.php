@extends('layouts.app')

@section('title', 'Lista de problemas')

@section('content')

	@include('admin.template.partials.errors')
	<div class="table-responsive">
		<a href="{{ route('member.problems.create') }}" class="btn btn-info">Registrar nuevo problema</a>
		{!! Form::open(['route' => 'member.problems.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
			<label for="name">Buscar problema: </label>
			<div class="input-group">
				{!! Form::text('name', null, ['id'=>'name','title'=>'Ingresar problema','class' => 'form-control', 'placeholder' => 'Buscar problema', 'aria-describedby' => 'search']) !!}
				<span class="input-group-addon" id="search">
					<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
				</span>
			</div>
		{!! Form::close() !!}
		<table class="table table-striped">
			<thead>
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Estado</th>
			</thead>
			<tbody>
				@foreach($problems as $problem)
					@if($problem->user_id == Auth::user()->id)
						<tr>
						<td>{{ $problem->name }}</td>
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