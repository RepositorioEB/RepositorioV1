@extends('layouts.app')

@section('title', 'Lista de foros')

@section('content')
	<div class="table-responsive">
		@if (\Auth::user()->role == 'admin')   <!-- Condicion si es administrador-->
            <a href="{{ route('admin.forums.create') }}" class="btn btn-info">Crear nuevo foro admin</a>
        @else
            <a href="{{ route('member.forums.create') }}" class="btn btn-info">Crear nuevo foro</a>
        @endif
		@include('admin.template.partials.errors')
		<!-- Formualrio para mostrar los foros registrados-->
		{!! Form::open(['route' => 'foro.foros_usuarios.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
			<label for="name">Buscar foro: </label>
			<div class="input-group">
				{!! Form::text('name', null, ['id'=>'name','title'=>'Ingresar foro','class' => 'form-control', 'placeholder' => 'Buscar foro', 'aria-describedby' => 'search']) !!}
				<span class="input-group-addon" id="search">
					<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
				</span>
			</div>
		{!! Form::close() !!}
		@if(count($forums)>0)
		<table class="table table-striped ">
			<thead>
				<th>Nombre</th>
				<th>Características</th>
				<th>Creador</th>
				<th>Acción</th>
			</thead>
			<tbody>
				@foreach($forums as $forum)   <!-- Ciclo de foros-->
					<tr>
						<td>{{ $forum->name }}</td>
						<td>{{ $forum->characteristic }}</td>
						@foreach($users as $user)   <!-- Ciclo de usuario-->
							@if($user->id==$forum->user_id)
								<td>{{ $user->name }}</td>		
							@endif			
						@endforeach		
						<td>
							<!-- Enlace para seleccionar foro-->
		                    <a href="{{ route('foro.foros_usuarios.message',['forum_id'=>$forum->id]) }}" class="btn btn-warning" title="Seleccionar Foro"><span class="glyphicon glyphicon-ok" aria-hidden="true">Seleccionar</span></a>
	    				</td>
					</tr>
				@endforeach
			</tbody>	
		</table>
		<div class="text-center">
			{!! $forums->render() !!}   <!-- Paginacion fora-->
		</div>
		@else
			<br><br><br><br>
			<h3><legend>&nbsp;&nbsp;&nbsp;No se encontró ningún elemento.</legend></h3>
		@endif
	</div>
@endsection