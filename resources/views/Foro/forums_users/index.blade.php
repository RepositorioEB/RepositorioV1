@extends('layouts.app')

@section('title', 'Lista de foros')

@section('content')
	<div class="table-responsive">
		@if (\Auth::user()->role == 'admin') 
            <a href="{{ route('admin.forums.create') }}" class="btn btn-info">Crear nuevo foro admin</a>
        @else
            <a href="{{ route('member.forums.create') }}" class="btn btn-info">Crear nuevo foro memeber</a>
        @endif
		@include('admin.template.partials.errors')
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
		                    <a href="{{ route('foro.foros_usuarios.message',['forum_id'=>$forum->id,'user_id'=>Auth::user()->id]) }}" class="btn btn-warning" title="Seleccionar"><span class="glyphicon glyphicon-ok" aria-hidden="true">Seleccionar</span></a>
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