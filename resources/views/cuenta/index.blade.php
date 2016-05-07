@extends('cuenta.accountview')

@section('title', 'Tu cuenta')

@section('content')
	<div class="form-signin">
		<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
	        <div class="panel panel-default">
	            <div class="panel-heading">Tu perfil</div>
	            <div class="panel-body">
	                <div class="media">
			          	<div class="media-center">
			          		<img class="imag-responsive"  src="{{asset('images/users/'.$user->photo.'')}}" width="230" height="230" name="photo" alt="avatar"/>
			          		<h1>{{$user->name." ".$user->last_name}}  <!-- Datos de usuario-->
			          			<small >{{$user->username}}</small>
			          		</h1>
			        	</div>
			        </div>
	            </div>
	        </div>
	        <div class="panel panel-default">
	            <div class="panel-heading">Acciones</div>
	            <div class="panel-body">
	            	<center>
	            	<!-- Enlace de menu de ovas-->
	                <a href="{{ route('ovas.menu') }}" class="btn btn btn-warning" title="Ovas"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Ovas</a>
					</br></br>
					<!-- Enlace de foros-->
					<a href="{{ route('foro.foros_usuarios.index') }}" class="btn btn btn-warning" title="Foros"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Foros</a>
					</br></br>
					<!-- Enlace de chats-->
					<a href="{{ route('chat.users_chats.index') }}" title="Chatear" class="btn btn-warning"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Chat</a>
	            	</center>
	            </div>
	        </div>
	    </div>
	    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
	        <div class="panel panel-default">
	            <div class="panel-heading">Tus datos</div>
	            <div class="panel-body">
	            	@include('flash::message')   <!-- Mensaje flash para el usuario-->
	            	<div class="table-responsive">
	            		<table class="table table-striped">
							<thead>
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Correo electronico</th>
								<th>Fecha de nacimiento</th>
								<th>Discapacidad</th>
								<th>Pais</th>
							</thead>
							<tbody>
								<tr>
									<td>{{ $user->name }}</td>
									<td>{{ $user->last_name }}</td>
									<td>{{ $user->email }}</td>
									<td>{{ $user->date }}</td>
									<td>{{ $user->profile->name }}</td>
									<td>{{ \App\Country::countryCode($user->country) }}</td>
								</tr>
							</tbody>	
						</table>
	            	</div>
					@if($user->studies != null)
						<label>Estudios: </label></br>
						<p>{{ $user->studies }}</p>
					@endif
		            <center>
		            	<a href="{{ route('cuenta.user.password', $user->id) }}" class="btn btn btn-warning" title="PasswordEdit" name="Modificar_password">Modificar contraseña</a>
		            	<a href="{{ route('cuenta.user.edit', $user->id) }}" class="btn btn btn-warning" title="Modificar_datos" name="Modificar_datos">Modificar datos</a>
		            </center>
	            </div>
	        </div>
	        <div class="panel panel-default">
	            <div class="panel-heading">Tus ovas</div>
	            <div class="panel-body">
	            	@if($i)
	            		<!-- Formulario para raer ovas de usuario-->
						{!! Form::open(['route' => 'cuenta.user.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
							<label for="sel1" class="control-label">Buscar por:</label>
							<select class="form-control" id="sel1" name="select">
				    			<option>Nombre</option>
				    			<option>Tipo</option>
				    			<option>Categoria</option>
				  			</select>
							{!! Form::label('name','Ingrese el nombre:') !!}
							<div class="input-group">
								{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar ova', 'aria-describedby' => 'search']) !!}
								<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
							</div>
						{!! Form::close() !!}
		            	<table class="table table-striped">
							<thead>
								<th>Nombre</th>
								<th>Lenguaje</th>
								<th>Descripcion</th>
								<th>Puntuacion</th>
								<th>Tipo</th>
								<th>Categoria</th>
							</thead>
							<tbody>
								@foreach($ovas as $ova)
									@if($ova->user_id == $user->id)
										<tr>
											<td>{{ $ova->name }}</td>
											<td>{{ \App\Language::languageCode($ova->language)}}</td>
											<td>{{ $ova->description }}</td>
											<td>{{ $ova->punctuation }}</td>
											<td>{{ $ova->type->name }}</td>
											<td>{{ $ova->category->name }}</td>
										</tr>
									@endif
								@endforeach
							</tbody>	
						</table>
					@else
						{{ 'Ud no ha subido ningun ova a este repositorio' }}
					@endif
	            </div>
	        </div>

	        <div class="panel panel-default">
	            <div class="panel-heading">Tus foros</div>
	            <div class="panel-body">
	            	@if($j)
	            		<!-- Formulario para traer foros de usuario-->
						{!! Form::open(['route' => 'cuenta.user.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
							{!! Form::label('nameForo','Ingrese el nombre del foro:') !!}
							<div class="input-group">
								{!! Form::text('nameForo', null, ['class' => 'form-control', 'placeholder' => 'Buscar foro', 'aria-describedby' => 'search']) !!}
								<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
							</div>
						{!! Form::close() !!}
						<table class="table table-striped">
							<thead>
								<th>Nombre</th>
								<th>Caracteristicas</th>
							</thead>
							<tbody>
								@foreach($forums as $forum)
									@if($forum->user_id == $user->id)
										<tr>
											<td>{{ $forum->name }}</td>
											<td>{{ $forum->characteristic }}</td>
										</tr>
									@endif
								@endforeach
							</tbody>	
						</table>
					@else
						{{ 'Ud no ha creado ningun foro en este repositorio' }}
					@endif
	            </div>
	        </div>

	    </div>
	</div>
@endsection