@extends('layouts.app')

@section('title', 'Chat' )

@section('content')

	<?php
		$array=[];
        foreach($users as $user) 
        {   
        	if($user->username != Auth::user()->username)
        	{
        		$array[$user->username] = $user->username; 
        	}      
        }
	?>

	
	<br><br><br><br>
	<center>
	{!! Form::open(['route' => 'chat.users_chats.index','method'=>'GET','target'=>'_blank'])!!}
		<div class="input-group">
		{!! Form::label('seleccion', 'Seleccione el contacto: &nbsp;',['class'=>'form-control'])!!}				
		{!! Form::select('nombredestino',$array,null,['title'=>'Seleccionar Usuario','class'=>'form-control'])!!}
		<br><br><br><br>		
		<center>
		{!! Form::submit('Chatear',['class'=>'btn btn-primary'])!!}
		</center>
		</div>
	<br>
	{!! Form::close()!!}
	</center>

	<table class="table table-striped">
		<thead>
			<th>Nombre Usuario</th>
			<th>Contactar</th>
		</thead>
		<tbody>
			@foreach($users as $user)
				@if (($user->username != Auth::user()->username))
				<tr>
					<td>{{ $user->username }}</td>
					<td>
						<a href="{{ route('chat.users_chats.index', ['nombredestino' => $user->username]) }}" target="_blank" class="btn btn-default btn-lg active"><span class="glyphicon glyphicon-phone" aria-hidden="true"></span></a>
					</td>
				</tr>
				@endif
			@endforeach
		</tbody>	
	</table>
	<div class="text-center">
		{!! $users->render() !!}
	</div>
	
@endsection