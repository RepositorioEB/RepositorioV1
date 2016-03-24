@extends('layouts.app')

@section('title', 'Inicio')
@section('content')
    <center>
        <h1>Repositorio de Objetos Virtuales de Aprendizaje Accesible</h1>
    </center>
    <br>
    <h3>¡Bienvenido!</h3>
    <p align="justify">En esta pagina podr&aacute;s encontrar las herramientas principales para la utilidad de los Objetos Virtuales de Aprendizaje, teniendo en cuenta la accesibilidad web, principalmente para personas con discapacidad auditiva y visual.</p>
    <p align="justify">De tal forma, cada uno de los usuarios que utilice este repositorio podr&aacute; realizar la comunicacion mutua en el foro mostrado en el indice de la p&aacute;gina como tambi&eacute;n la ayuda de los administradores de la misma. </p>
    <p>&nbsp;</p>
    @if(Auth::check() != true)
        <center>
            <a href="{{ url('/register') }}" title="Boton" class="btn btn-success" tabindex="1" accesskey="s">Registrarse</a>
        </center>
    @endif
@endsection