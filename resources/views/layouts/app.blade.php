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
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/trumbowyg/ui/trumbowyg.css') }}">
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
    <br><br><br><br><br><br>
    <div class="container">
        <section class="main row">
            <div class="section-admin">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">@yield('title')<h5 class="navbar-form pull-right"><script language="JavaScript" type="text/javascript" >document.write(TODAY);</script></h5></div>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="panel-body">
                                <div class="col-xs-12 col-sm-14 col-md-14 col-lg-14">
                                    <div class="panel-body">
                                        @include('flash::message')
                                        @yield('content')
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    {!! Form::open(['route' => 'admin.users.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
                                    <div class="input-group">
                                        {!! Form::text('busqueda', null, ['class' => 'form-control', 'placeholder' => 'Buscar', 'aria-describedby' => 'search']) !!}
                                        <span class="input-group-addon" id="search"><button title="Boton buscar" onclick=""><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button></span>
                                    </div>
                                    {!! Form::close() !!}
                                    <br><br><br>
                                    <ul>
                                        <li><h4><div class="label label-info">
                                            Archivos recientes</div></h4></li>
                                        <ul>
                                            <li><a href="">Archivo1</a></li>
                                            <li><a href="">Archivo2</a></li>
                                            <li><a href="">Archivo3</a></li>
                                            <li><a href="">Archivo4</a></li>
                                            <li><a href="">Archivo5</a></li>
                                        </ul>
                                        <li><h4><div class="label label-info">Noticias</div></h4></li>

                                        <li><h4><div class="label label-info">Acerca de</div></h4></li>
                                    </ul>
                                    <br>
                                    <center>
                                        <a href="../member/contactos" title="Chatear" class="btn btn-success" tabindex="1" accesskey="s">¡Chat!</a>
                                        <a href="../member/foros-lista" title="Foros" class="btn btn-success" tabindex="1" accesskey="s">¡Foros!</a>
                                    </center>
                                </div>
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
    <!-- Fin Modificado (ed) -->
</body>
</html>
