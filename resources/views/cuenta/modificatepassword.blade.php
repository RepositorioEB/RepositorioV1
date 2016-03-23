@extends('cuenta.accountview')

@section('title', 'Tu cuenta')

@section('content')
	<div class="form-signin">
		<div class="col-md-3">
	        <div class="panel panel-default">
	            <div class="panel-heading">Tu perfil</div>
	            <div class="panel-body">
	                <div class="media">
			          	<div class="media-center">
			          		<a href=""><img class="imag-responsive" src="/images/users/{{ $user->photo }}" width="230" height="230" name="photo" /></a>
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
	    <div class="col-md-9">
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
				            	{!! Form::submit('Guardar',['class' => 'btn btn-primary']) !!}
				            	<a href="{{ route('cuenta.user.index') }}" class="btn btn btn-primary" title="Modificar_datos" name="Cancelar">Cancelar</a>
				            </center>
						{!! Form::close() !!}
					</div>
	            </div>
	        </div>	        
	    </div>
	</div>

@endsection