@extends('layouts.app')

@section('title', 'Chat' )

@section('content')

	<?php
		$array=[];
        foreach($users as $user) 
        {   
        	if($user->username != Auth::user()->username)
        	{
        		$array[$user->username] = $user->username;   //Arreglo para los ombres de usuarios
        	}      
        }
	?>
	
	<br><br><br><br>
	<center>
	{!! Form::open(['route' => 'chat.users_chats.conversationchat','method'=>'GET','target'=>'_blank'])!!} <!-- Formulario para traer los usuarios para chatear-->
		<div class="input-group">
		{!! Form::label('nombredestino', 'Seleccione el contacto: &nbsp;',['for'=>'nombredestino','class'=>'form-control'])!!}				
		{!! Form::select('nombredestino',$array,null,['id'=>'nombredestino','class'=>'form-control'])!!}  <!-- Seleccionador de usuario para chatear-->
		<br><br><br><br>		
		<center>
		{!! Form::submit('Chatear',['class'=>'btn btn-primary'])!!}  <!-- Boton para chatear-->
		</center>
		</div>
	<br>
	{!! Form::close()!!}
	</center>
	{!! Form::open(['route' => 'chat.users_chats.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}   <!-- Formulario para traer los usuarios registrados-->
			<label for="name">Buscar usuario: &nbsp;&nbsp;  </label>
			<div class="input-group">
				{!! Form::text('username', null, ['id'=>'username','title'=>'Ingresar usuario','class' => 'form-control', 'placeholder' => 'Ingresar usuario', 'aria-describedby' => 'search']) !!} <!-- Campo para buscar usuario-->
				<span class="input-group-addon" id="search">
					<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
				</span>
			</div>
	{!! Form::close() !!}
		
	<table class="table table-striped">
		<thead>
			<th>Nombre Usuario</th>
			<th>Contactar</th>
		</thead>
		<tbody>
			@foreach($users as $user)   <!-- Ciclo de usuarios-->
				@if (($user->username != Auth::user()->username)) <!-- Condicion para el usuario que inicio sesion-->
				<tr>
					<td>{{ $user->username }}</td>
					<td>
						<a href="{{ route('chat.users_chats.conversationchat', ['nombredestino' => $user->username]) }}" target="_blank" class="btn btn-default btn-lg active"><span class="glyphicon glyphicon-phone" aria-hidden="true">Seleccionar</span></a>  <!-- Enlace para seleccionar el usuario-->
					</td>
				</tr>
				@endif
			@endforeach
		</tbody>	
	</table>
	<div class="text-center">
		{!! $users->render() !!} <!--Paginacion de usuarios -->
	</div>
	
@endsection