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
			          		<a href=""><img class="imag-responsive" src="/images/users/{{ $user->photo }}" width="230" height="230" name="photo" /></a>
			          		<h1>{{$user->name." ".$user->last_name}}
			          			<small>{{$user->username}}</small>
			          		</h1>
			        	</div>
			        </div>
	            </div>
	        </div>
	        <div class="panel panel-default">
	            <div class="panel-heading">Acciones</div>
	            <div class="panel-body">
	                <a href="#" class="btn btn btn-primary" title="Comentarios"><span class="glyphicon glyphicon-wrench" aria-hidden="true" >Comentarios</span></a>
					</br>
					<a href="#" class="btn btn btn-primary" title="Ovas"><span class="glyphicon glyphicon-trash" aria-hidden="true">Ovas</span></a>
					</br>
					<a href="#" class="btn btn btn-primary" title="Foro"><span class="glyphicon glyphicon-trash" aria-hidden="true">Foro</span></a>
					</br>
					<a href="../chat/contactos" title="Chatear" class="btn btn-success" tabindex="1" accesskey="s">¡Chat!</a>
	            </div>
	        </div>
	    </div>
	    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
	        <div class="panel panel-default">
	            <div class="panel-heading">Tus datos</div>
	            <div class="panel-body">
	            	@include('flash::message')
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
									<td>{{ $user->country }}</td>
								</tr>
							</tbody>	
						</table>
	            	</div>
					@if($user->studies != null)
						<label>Estudios: </label></br>
						<p>{{ $user->studies }}</p>
					@endif
		            <center>
		            	<a href="{{ route('cuenta.user.password', $user->id) }}" class="btn btn btn-primary" title="PasswordEdit" name="Modificar_password">Modificar contraseña</a>
		            	<a href="{{ route('cuenta.user.edit', $user->id) }}" class="btn btn btn-primary" title="Modificar_datos" name="Modificar_datos">Modificar datos</a>
		            </center>
	            </div>
	        </div>
	        {!! Form::open(['route' => 'cuenta.user.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
			<select class="form-control" id="sel1" name="select">
    			<option>Nombre</option>
    			<option>Tipo</option>
    			<option>Categoria</option>
  			</select>
			<div class="input-group">
				{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar ova', 'aria-describedby' => 'search']) !!}
				<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
			</div>
			{!! Form::close() !!}
			<h3><label class="navbar-form pull-right">Busqueda de OVA:</label></h3>
			<br><br><br>	        
	        <div class="panel panel-default">
	            <div class="panel-heading">Tus ovas</div>
	            <div class="panel-body">
	            	@if($i)
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
											<td>{{ $ova->language }}</td>
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
						{{ 'Ud no ha subido ninguna ova a este repositorio' }}
					@endif
	            </div>
	        </div>
	    </div>
	</div>

@endsection