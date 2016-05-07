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
			          		<a href=""><img class="imag-responsive" src="{{asset('images/users/'.$user->photo.'')}}" width="230" height="230" name="photo" alt="avatar"/></a>
			          		<h1>{{$user->name." ".$user->lastname}}
			          			<small>{{$user->username}}</small>
			          		</h1>
			        	</div>
			        </div>
	            </div>
	        </div>
	        <div class="panel panel-default">
	            <div class="panel-heading">Acciones</div>
	            <div class="panel-body">
	            	<center>
	                <a href="{{ route('ovas.menu') }}" class="btn btn btn-warning" title="Ovas"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Ovas</a>
					</br></br>
					<a href="{{ route('foro.foros_usuarios.index') }}" class="btn btn btn-warning" title="Foros"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Foros</a>
					</br></br>
					<a href="{{ route('chat.users_chats.index') }}" title="Chatear" class="btn btn-warning"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>¡Chat!</a>
	            	</center>
	            </div>
	        </div>
	    </div>
	    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
	        <div class="panel panel-default">
	            <div class="panel-heading">Tus datos</div>
	            <div class="panel-body">
	            	<div class="form-group">
	            		@include('admin.template.partials.errors')
	            		@include('flash::message')
	            		<!-- Formulario para editar datos de usuario-->
	            		{!! Form::open(['route' => ['cuenta.user.updates', 'section' => 'passwordnew'], 'method' => 'PUT']) !!}
	            			@include('cuenta.fieldspassword')
	            			<div class="form-group">
								<center>
					            		{!! Form::submit('Guardar',['class' => 'btn btn-warning']) !!}
					            		<a href="{{ route('cuenta.user.index') }}" class="btn btn btn-warning" title="Modificar_datos" name="Cancelar">Cancelar</a>
					            </center>
				            </div>
						{!! Form::close() !!}
					</div>
	            </div>
	        </div>	        
	    </div>
	</div>

@endsection