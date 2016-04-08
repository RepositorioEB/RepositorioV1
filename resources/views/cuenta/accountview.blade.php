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
    
    <!-- Fin Modificado (ed) -->

    @if (Auth::guest())  <!-- Condicion si ha iniciado sesion el usuarios-->
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/stylesDaltonismo.css') }}">
    @else

        @if(Auth::user()->profile->name =='Daltonismo')  <!--Condicion si el usuario sufre de daltonismo -->
            <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
            <link rel="stylesheet" href="{{ asset('css/stylesDaltonismo.css') }}">
        @else
            <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
            <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
        @endif
    @endif   
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
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
        @include('layouts.nav')   <!-- Incluir navegacion-->
    </header>
    <br><br><br><br><br><br>
    <div class="container">
        <section class="main row">
            <div class="section-admin">
                @yield('content')  <!-- Incluir contenido-->
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
    <!-- Fin Modificado (ed) -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class=" glyphicon glyphicon-menu-right" aria-hidden="true"> </span>Creado por Braian Estiven Alvarado Rodriguez y Edison Andres Quijano Suarez</h4>
        </div>
    </div>
</body>
</html>
