@extends('layouts.app')

@section('title', 'Registro')
@section('content')
    <br><br>
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
        {!! csrf_field() !!}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label" for="name">Nombre: </label>

            <div class="col-md-6">
                <!-- Campo para el nombre de usuario-->
                <input type="text" id="name" title="Nombre" class="form-control" name="name" value="{{ old('name') }}">

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label" for="username">Nombre de usuario: </label>

            <div class="col-md-6">
                <!-- Campo para el nicname del usuario-->
                <input type="text" id="username" title="Nombre de usuario" class="form-control" name="username" value="{{ old('username') }}">

                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label" for="email">Correo electrónico: </label>

            <div class="col-md-6">
                <!-- Campo para el correo electronico del usuario-->
                <input type="email" id="email" title="Correo electronico" class="form-control" name="email" value="{{ old('email') }}">

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
            <label class="col-md-4 control-label" for="contraseña">Contraseña</label>

            <div class="col-md-6">
                <!-- Campo para la contrasela del usaurio-->
                <input type="password" id="contraseña" class="form-control" name="password" values="{{$clave}}">

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label" for="contraseña_confirmar">Confirmar contraseña</label>
            <div class="col-md-6">
                <input type="password" id="contraseña_confirmar" class="form-control" name="password_confirmation" values="{{$clave}}">

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label" for="gender">Genero: </label>

            <div class="col-md-6">
                <!-- Campo para seleccionar el genero-->
                <select title="Seleccionar genero" class="form-control" id="gender" name="gender">
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
            <label class="col-md-4 control-label" for="birthdate">Fecha de nacimiento: </label>

            <div class="col-md-6">
                <!-- Campo para la fecha de nacimiento-->
                <input type="date" id="birthdate" title="Fecha de nacimiento" class="form-control" name="date" value="{{ old('date') }}" >

                @if ($errors->has('date'))
                    <span class="help-block">
                        <strong>{{ $errors->first('date') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('profile_id') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label" for="profile">Discapacidad: </label>

            <div class="col-md-6">
                {!! Form::select( 'profile_id', \App\Profile::orderBy('name', 'ASC')->lists('name', 'id'), null , ['id' =>'profile', 'title' =>'Seleccionar discapacidad','class' => 'form-control','required']) !!}

                @if ($errors->has('profile_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('profile_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label" for="country">País: </label>

            <div class="col-md-6">
                <!-- Campo para seleccionar el pais-->
                {!! Form::select( 'country', \App\Country::countryList(), 'CO', ['id' =>'country','title' =>'Seleccionar pais','class' => 'form-control','required']) !!}

                @if ($errors->has('country'))
                    <span class="help-block">
                        <strong>{{ $errors->first('country') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">        
            <script type="text/javascript">
            document.write("<a href='#ventana1' class='btn btn-primary' data-toggle='modal'>");
            document.write("<i class='fa fa-btn fa-user'></i>");
            document.write("Registrar");
            document.write("</a>");
            </script>
            
            <div class="modal fade" id="ventana1">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button tyle "submit" class="close" data-dismiss="modal" aria-hiden="true">&times;</button>
                    <h3 class="modal-title"><label for="aviso"> Aviso</label></h3>
                </div>
                <div class="modal-body">
                    <!--{!! Form::text('aviso', 'Se realizará una solicitud para que el administrador acepte subir el OVA al repositorio.', ['id'=>'aviso','class' => 'form-control','readonly'=>'readonly']) !!}-->
                    <!--Campo para mostrar el mensaje -->
                    {!! Form::textarea('aviso', 'Cuando el usuario sea registrado, inicie sesión para ingresar al repositorio.', ['rows'=>'2','cols'=>'10%','id'=>'aviso','class' => 'form-control','readonly'=>'readonly']) !!}
                </div>
                <div class="modal-footer">
                    <button type="submit" title="Boton registro" class="btn btn-primary">
                        Aceptar
                    </button>
                </div>
            </div>
            </div>
            </div>
            </div>
        </div>
        <noscript>
            <div class="col-md-6 col-md-offset-4">        
            Cuando el usuario sea registrado, inicie sesión para ingresar al repositorio.
            <br><br>
            <button type='submit' title='Boton registro' class='btn btn-primary'>
                <i class='fa fa-btn fa-user'></i>Registrar
            </button>
            </div>
        </noscript>
        <!--Al dar Click en el botón registro, se le enviará una contraseña a su correo con la que podrá ingresar al repositorio y cambiarla si lo desea.-->
    </form>
@endsection
