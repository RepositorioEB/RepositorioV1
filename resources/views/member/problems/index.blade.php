@extends('layouts.app')

@section('title', 'Lista de problemas')

@section('content')

	@include('admin.template.partials.errors')
	<div class="table-responsive">
		<a href="{{ route('member.problems.create') }}" class="btn btn-info">Registrar nuevo problema</a>       <!-- Enlace para registrar un nuevo problema-->
		{!! Form::open(['route' => 'member.problems.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}     <!-- Formulario para traer los problemas registrados-->
			<label for="name">Buscar problema: </label>
			<div class="input-group">
				{!! Form::text('name', null, ['id'=>'name','title'=>'Ingresar problema','class' => 'form-control', 'placeholder' => 'Buscar problema', 'aria-describedby' => 'search']) !!}   <!-- Campo para ingresar el problema que desea buscar-->
				<span class="input-group-addon" id="search">
					<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
				</span>
			</div>
		{!! Form::close() !!}
		@if(count($problems)>0)
		<table class="table table-striped">
			<thead>
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Estado</th>
			</thead>
			<tbody>
				@foreach($problems as $problem)    <!-- Ciclo de problemas-->
					@if($problem->user_id == Auth::user()->id)    <!-- Condicion para comparar el id del usuario-->
						<tr>
						<td>{{ $problem->name }}</td>
						<td>{{ $problem->description }}</td>
						@if($problem->state == 0)   <!-- Condicion para verificar el estado del problema-->
							<td><h4><span class="label label-primary">Sin resolver</span></h4></td>
						@else
							<td><h4><span class="label label-danger">Resuelto</span></h4></td>
						@endif
						</tr>
					@endif
				@endforeach
			</tbody>	
		</table>
		<div class="text-center">
			{!! $problems->render() !!}       <!-- Paginacion de los problemas-->
		</div>
		@else
			<br><br>
			<h3><legend>&nbsp;&nbsp;&nbsp;No se encontró ningún elemento.</legend></h3>
		@endif
	</div>
@endsection