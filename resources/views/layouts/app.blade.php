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

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    
    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <!-- Inicio Modificado (ed) -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
    <!-- Fin Modificado (ed) -->

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
    <script language="JavaScript" type="text/javascript">
        var d=new Date();
        var monthname=new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");  
        var TODAY = monthname[d.getMonth()] + " " + d.getDate() + ", " + d.getFullYear();
    </script>
</head>
<body id="app-layout">
    <!-- Inicio Modificado (ed) -->
    <header>
        @include('layouts.nav')
    </header>
    <br><br><br><br><br><br><br>
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
                                    <h5 class="navbar-form pull-right">
                                        <script language="JavaScript" type="text/javascript" >document.write(TODAY);</script>
                                    </h5>
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
                            <div class="panel-body">
                                {!! Form::open(['route' => 'admin.users.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
                                    <div class="input-group">
                                        <span class="input-group-addon" id="search">
                                            <input type="Buscar" title="Busqueda" onclick="" placeholder="Buscar" /> 
                                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                        </span>
                                    </div>
                                {!! Form::close() !!}
                                <br><br><br>
                                <ul>
                                    <li><h4><div class="label label-info">Archivos recientes</div></h4>
                                        <ul>
                                        {!! Form::open( ['route' => ['ovas.recentarchive.index'],'method' => 'GET', 'files' => true]) !!}
                                        <li>&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-book" aria-hidden="true"> {!! Form::submit('Ovas') !!}</span></li>
                                        {!! Form::close() !!}   
                                        </ul>
                                    </li>
                                    <li><h4><div class="label label-info">Noticias</div></h4></li>
                                    <li><h4><div class="label label-info">Acerca de</div></h4></li>
                                </ul>
                                <br>
                                <center>
                                    <a href="{{ route('chat.users_chats.index') }}" title="Chatear" class="btn btn-success" tabindex="1" accesskey="1">¡Chat!</a>
                                    <a href="{{ route('foro.foros_usuarios.index') }}" title="Foros" class="btn btn-success" tabindex="1" accesskey="2">¡Foros!</a>
                                    <a href="../../ovas/menu" title="Ovas" class="btn btn-success" tabindex="1" accesskey="3">¡Ovas!</a>
                                </center>
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
    <!-- Fin Modificado (ed) -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h6 >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Creado por Braian Estiven Alvarado Rodriguez y Edison Andres Quijano Suarez</h6>
        </div>
    </div>
</body>
</html>