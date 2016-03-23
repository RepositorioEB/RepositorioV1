@extends('cuenta.accountview')

@section('title', 'Tu cuenta')

@section('content')
	<div class="form-signin">
		{!! Form::model($user, ['route' => ['cuenta.user.update', 'section' => 'modificate'],'method' => 'PUT', 'files' => true]) !!}
				<div class="col-md-3">
			        <div class="panel panel-default">
			            <div class="panel-heading">Tu perfil</div>
			            <div class="panel-body">
			                <div class="media">
					          	<div class="media-center">
					          		<a href=""><img class="imag-responsive" src="/images/users/{{ $user->photo }}" width="230" height="230" name="photo" /></a>
									{!! Form::label('photo','Cambiar foto')!!}
					          		{!! Form::file('photo')!!}
					          	</div>
					        </div>
			            </div>
			        </div>
			    </div>
			    <div class="col-md-9">
			        <div class="panel panel-default">
			            <div class="panel-heading">Tus datos</div>
			            <div class="panel-body">
							@include('cuenta.fieldsaccount')
				            <center>
				            	<input class="btn btn-primary" type="submit" value="Guardar" name="Guardar" style="width: 120px;" />
				            	<a href="{{ route('cuenta.user.index') }}" class="btn btn btn-primary" title="Cancelar" name="Cancelar">Cancelar</a>
				            </center>
			            </div>
			        </div>
			    </div>
		{!! Form::close() !!}
	</div>

@endsection