@extends('layouts.app')

@section('title', 'Lista de foros')

@section('content')
	@include('admin.template.partials.errors')
	<table class="table table-striped">
		<thead>
			<th>Id</th>
			<th>Nombre</th>
			<th>Caracteristicas</th>
			<th>Creador</th>
			<th>Accion</th>
		</thead>
		<tbody>
			@foreach($forums as $forum)
				<tr>
					<td>{{ $forum->id }}</td>
					<td>{{ $forum->name }}</td>
					<td>{{ $forum->characteristic }}</td>
					@foreach($users as $user)
						@if($user->id==$forum->user_id)
							<td>{{ $user->name }}</td>		
						@endif			
					@endforeach		
					<td>
	                    <a href="{{ route('member.foros_usuarios.index',['forum_id'=>$forum->id,'user_id'=>Auth::user()->id]) }}" class="btn btn-warning"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
    				</td>
				</tr>
			@endforeach
		</tbody>	
	</table>
	<div class="text-center">
		{!! $forums->render() !!}
	</div>
	
@endsection