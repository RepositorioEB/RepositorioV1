<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!--<title>Repositorio</title>-->

    <!-- Inicio Modificado (ed) -->
    <title>@yield('title', 'Inicio')</title>
    <!-- Fin Modificado (ed) -->


    
    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <!-- Inicio Modificado (ed) -->
    <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
    <!-- Iconos -->
    <!--<link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">-->
    <!-- Fin Modificado (ed) -->
    @if (Auth::guest())   <!-- Condicion inicio de sesion-->
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/stylesDaltonismo.css') }}">
    @else

        @if(Auth::user()->profile->name =='Daltonismo')   <!-- Condicion de discapacidad-->
            <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
            <link rel="stylesheet" href="{{ asset('css/stylesDaltonismo.css') }}">
        @else
            <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
            <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
        @endif
    @endif    
    
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    
       #cargando{
            display: none;
       }
    </style>
</head>
<body id="app-layout">
    <!-- Inicio Modificado (ed) -->
    <header>
        @include('layouts.nav')
    </header>
    <br><br><br><br><br><br>
    <div class="container">
        <section class="main row">
            <div class="section-admin">
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
                                    @yield('title')
                                    <div class="col-md-2.5 borde pull-right">
                                        <!-- Fecha con el uso de la libreria carbon sin necesidad de javascript-->
                                        <?php
                                            $mesn =\Carbon\Carbon::now()->format('m');
                                            if( $mesn == 1 ) $mes = 'Enero';
                                            if( $mesn == 2 ) $mes = 'Febrero';
                                            if( $mesn == 3 ) $mes = 'Marzo';
                                            if( $mesn == 4 ) $mes = 'Abril';
                                            if( $mesn == 5 ) $mes = 'Mayo';
                                            if( $mesn == 6 ) $mes = 'Junio';
                                            if( $mesn == 7 ) $mes = 'Julio';
                                            if( $mesn == 8 ) $mes = 'Agosto';
                                            if( $mesn == 9 ) $mes = 'Septiembre';
                                            if( $mesn == 10 ) $mes = 'Octubre';
                                            if( $mesn == 11 ) $mes = 'Noviembre';
                                            if( $mesn == 12 ) $mes = 'Diciembre';
                                        ?>
                                        {{$mes}}
                                        {!!\Carbon\Carbon::now()->format('d');!!}
                                        {{','}}
                                        {!!\Carbon\Carbon::now()->format('Y');
                                        !!}
                                    </div> 
                                </div>
                            </div>
                            <div class="panel-body">
                                @include('flash::message')
                                @yield('content')
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <center><b> Herramientas</b></center>
                                </div>
                            </div>
                            <div class="panel-body">
                                <h3><div class="label label-info">Búsqueda</div></h3>
                                {!! Form::open(['route' => 'search.mainsearch.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
                                    {!! Form::label('search','Ingresar búsqueda:')!!}
                                    <div class="input-group">
                                    {!! Form::text('search', null, ['id' => 'search','class' => 'form-control', 'placeholder' => 'Buscar','required', 'aria-describedby' => 'search']) !!}
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                                    </div>
                                {!! Form::close() !!}
    
                                <br><br><br><br>
                                <ul>
                                    <li><h3><div class="label label-info">Archivos recientes</div></h3>
                                        <ul>
                                        <!-- Formulario para abrir archivos recientes de OVA-->
                                        {!! Form::open( ['route' => ['ovas.recentarchive.index'],'method' => 'GET', 'files' => true]) !!}
                                        <li>&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-book" aria-hidden="true"></span> {!! Form::submit('Ovas') !!}</li>
                                        {!! Form::close() !!}   
                                        </ul>
                                        <br>
                                        <ul>
                                        <!-- Formulario para abrir archivos recientes de ayudas-->
                                        {!! Form::open( ['route' => ['helps.recentarchive'],'method' => 'GET', 'files' => true]) !!}
                                        <li>&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-book" aria-hidden="true"></span> {!! Form::submit('Ayudas') !!}</li>
                                        {!! Form::close() !!}   
                                        </ul>
                                        <br>
                                        <ul>
                                        <!-- Formulario para abir archivos recientes de foros-->
                                        {!! Form::open( ['route' => ['foro.forums.recentarchive'],'method' => 'GET', 'files' => true]) !!}
                                        <li>&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-book" aria-hidden="true"></span> {!! Form::submit('Foros') !!}</li>
                                        {!! Form::close() !!}   
                                        </ul>
                                    </li>
                                    <li><h3><div class="label label-info">Acerca de</div></h3></li>
                                        <li>&nbsp;&nbsp;&nbsp;<a href="{{ url('acercade') }}" title="Creadores"> - Creadores</a></li>
                                        <li>&nbsp;&nbsp;&nbsp;<a href="{{ url('problematica') }}" title="Acerca d"> - Problemática</a></li>
                                </ul>
                                <br>
                                <center>
                                    <!-- Enlaces para chat, foros y ovas-->
                                    <a href="{{ route('chat.users_chats.index') }}" title="Chatear" class="btn btn-success">¡Chat!</a>
                                    <a href="{{ route('foro.foros_usuarios.index') }}" title="Foros" class="btn btn-success">¡Foros!</a>
                                    <a href="{{ route('ovas.menu')}}" title="Ovas" class="btn btn-success" >¡Ovas!</a>
                                </center>
                                @if (Auth::guest())   <!-- Condicion inicio de sesion-->
                                @else
                                <div>
                                    <br><br>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                Mensajes
                                            </div>  
                                            </div>                                             
                                            <div class="panel-body">
                                                    <div id="mensajes">
                                                    
                                                    </div>
                                                    <audio src="/sonidos/Sonido.mp3" preload>
                                                        Tu explorador no soporta audio en HTML
                                                    </audio>
                                            </div>                                                                     
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Fin Modificado (ed) -->

    <!-- JavaScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    <!-- Inicio Modificado (ed) -->
    <script src="{{ asset('plugins/jquery/js/jquery-2.2.1.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>       <!-- Script para el envio de mensaje-->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script>
            $(document).on("ready", function(){             
                $.ajaxSetup({"cache":false});   //Uso del ajax para envio de mensaje
                setInterval("loadMessages()",3000);
            });
            var infor1=null;
            var infor2=null;
            var loadMessages = function (){
                $.ajax({
                    type: "GET",
                    url: "/chat/cargarMensajes"
                }).done(function(info){
                    $("#mensajes").html(info);
                    if(infor1==null){
                        infor1 =info;
                        infor2 =info; 
                    }
                    infor2=info;
                    if(infor1!=infor2){
                        $('audio')[0].play();
                        infor1=infor2;
                    }
                });
            }
    </script>
    <!-- Fin Modificado (ed) -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class=" glyphicon glyphicon-menu-right" aria-hidden="true"> </span> Creado por Braian Estiven Alvarado Rodriguez y Edison Andres Quijano Suarez</h4>
        </div>
    </div>
</body>
</html>