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
			          		<a href=""><img class="imag-responsive" src="/images/users/{{ $user->photo }}" width="230" height="230" name="photo" alt="avatar"/></a>
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
	                <a href="../../ovas/menu" class="btn btn btn-warning" title="Ovas"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Ovas</a>
					</br></br>
					<a href="{{ route('foro.foros_usuarios.index') }}" class="btn btn btn-warning" title="Foros"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Foros</a>
					</br></br>
					<a href="{{ route('chat.users_chats.index') }}" title="Chatear" class="btn btn-success">¡Chat!</a>
	            	</center>
	            </div>
	        </div>
	    </div>
	    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
	        <div class="panel panel-default">
	            <div class="panel-heading">Tus datos</div>
	            <div class="panel-body">
	            	<div class="form-group">
	            		@include('flash::message')
	            		{!! Form::open(['route' => ['cuenta.user.update', 'section' => 'passwordnew'], 'method' => 'PUT']) !!}
							{!! Form::label('password','Contraseña actual') !!}
							{!! Form::password('password', ['class' => 'form-control','placeholder' => '*********','required','min:8']) !!}
							{!! Form::label('newpassword','Contraseña nueva') !!}
							{!! Form::password('newpassword', ['class' => 'form-control','placeholder' => '*********','required','min:8']) !!}
							{!! Form::label('newpassword2','Confirme contraseña') !!}
							{!! Form::password('newpassword2', ['class' => 'form-control','placeholder' => '*********','required','min:8']) !!}
							<center>
								</br>
				            	{!! Form::submit('Guardar',['class' => 'btn btn-warning']) !!}
				            	<a href="{{ route('cuenta.user.index') }}" class="btn btn btn-warning" title="Modificar_datos" name="Cancelar">Cancelar</a>
				            </center>
						{!! Form::close() !!}
					</div>
	            </div>
	        </div>	        
	    </div>
	</div>

@endsection