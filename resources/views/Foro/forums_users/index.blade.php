@extends('layouts.app')

@section('title', 'Lista de foros')

@section('content')
	<div class="table-responsive">
		@if (\Auth::user()->role == 'admin') 
            <a href="{{ route('admin.forums.create') }}" class="btn btn-info">Crear nuevo foro admin</a>
        @else
            <a href="{{ route('member.forums.create') }}" class="btn btn-info">Crear nuevo foro</a>
        @endif
		@include('admin.template.partials.errors')
		{!! Form::open(['route' => 'foro.foros_usuarios.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
			<label for="name">Buscar foro: </label>
			<div class="input-group">
				{!! Form::text('name', null, ['id'=>'name','title'=>'Ingresar foro','class' => 'form-control', 'placeholder' => 'Buscar foro', 'aria-describedby' => 'search']) !!}
				<span class="input-group-addon" id="search">
					<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
				</span>
			</div>
		{!! Form::close() !!}
		<table class="table table-striped ">
			<thead>
				<th>Nombre</th>
				<th>Caracteristicas</th>
				<th>Creador</th>
				<th>Accion</th>
			</thead>
			<tbody>
				@foreach($forums as $forum)
					<tr>
						<td>{{ $forum->name }}</td>
						<td>{{ $forum->characteristic }}</td>
						@foreach($users as $user)
							@if($user->id==$forum->user_id)
								<td>{{ $user->name }}</td>		
							@endif			
						@endforeach		
						<td>
		                    <a href="{{ route('foro.foros_usuarios.message',['forum_id'=>$forum->id,'user_id'=>Auth::user()->id]) }}" class="btn btn-warning" title="Seleccionar Foro"><span class="glyphicon glyphicon-ok" aria-hidden="true">Seleccionar</span></a>
	    				</td>
					</tr>
				@endforeach
			</tbody>	
		</table>
		<div class="text-center">
			{!! $forums->render() !!}
		</div>
	</div>
@endsection