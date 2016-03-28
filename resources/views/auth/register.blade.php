@extends('layouts.app')

@section('title', 'Registro')
@section('content')
    <br><br>
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
        {!! csrf_field() !!}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Nombre: </label>

            <div class="col-md-6">
                <input type="text" title="Nombre" class="form-control" name="name" value="{{ old('name') }}">

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Nombre de usuario: </label>

            <div class="col-md-6">
                <input type="text" title="Nombre de usuario" class="form-control" name="username" value="{{ old('username') }}">

                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Correo electrónico: </label>

            <div class="col-md-6">
                <input type="email" title="Correo electronico" class="form-control" name="email" value="{{ old('email') }}">

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <?php 
            function getRandomCode(){
                $an = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ-)(.:,;";
                $su = strlen($an) - 1;
                return substr($an, rand(0, $su), 1) .
                    substr($an, rand(0, $su), 1) .
                    substr($an, rand(0, $su), 1) .
                    substr($an, rand(0, $su), 1) .
                    substr($an, rand(0, $su), 1) .
                    substr($an, rand(0, $su), 1) .
                    substr($an, rand(0, $su), 1) .
                    substr($an, rand(0, $su), 1);
            }
            $clave=getRandomCode();
        ?>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            
            <div class="col-md-6">
                <input type="hidden" title="Contraseña" value="{{$clave}}" class="form-control" name="password">

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                
            <div class="col-md-6">
                <input type="hidden" title="Confirmar contraseña" value="{{$clave}}" class="form-control" name="password_confirmation">

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Genero: </label>

            <div class="col-md-6">
                <select title="Seleccionar genero" class="form-control" name="gender">
                  <option value="man">Hombre</option>
                  <option value="woman">Mujer</option>
                </select>

                @if ($errors->has('gender'))
                    <span class="help-block">
                        <strong>{{ $errors->first('gender') }}</strong>
                    </span>
                @endif
            </div>
        </div>  

        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Fecha de nacimiento: </label>

            <div class="col-md-6">
                <input type="date" title="Fecha de nacimiento" class="form-control" name="date" value="{{ old('date') }}" >

                @if ($errors->has('date'))
                    <span class="help-block">
                        <strong>{{ $errors->first('gender') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('profile_id') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Discapacidad: </label>

            <div class="col-md-6">
                {!! Form::select( 'profile_id', \App\Profile::orderBy('name', 'ASC')->lists('name', 'id'), null, ['title' =>'Seleccionar discapacidad','class' => 'form-control','required']) !!}

                @if ($errors->has('profile_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('profile_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Rol: </label>

            <div class="col-md-6">
                    {!! Form::select('role', [ 'member' => 'Cliente', 'admin' => 'Administrador'], null, ['title' =>'Seleccionar rol','class' => 'form-control','required']) !!}

                @if ($errors->has('role'))
                    <span class="help-block">
                        <strong>{{ $errors->first('role') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" title="Boton registro" class="btn btn-primary">
                    <i class="fa fa-btn fa-user"></i>Registro
                </button>
            </div>
        </div>
        Al dar Click en el botón registro, se le enviará una contraseña a su correo con la que podrá ingresar al repositorio y cambiarla si lo desea.
    </form>
@endsection
