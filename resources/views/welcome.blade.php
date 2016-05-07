@extends('layouts.app')

@section('title', 'Inicio')
@section('content')
    <center>
        <h1>Repositorio de Objetos Virtuales de Aprendizaje Accesible</h>  <!-- Titulo-->
    </center>
    <br>
    <h2>¡Bienvenido!</h2>  <!-- Subtitulo-->
    <!-- Texto-->
    <p>En este repositorio podr&aacute;s encontrar las diferentes herramientas para la manipulación de los Objetos Virtuales de Aprendizaje, teniendo en cuenta la accesibilidad web.</p>
    <p>Cada uno de los usuarios que utilice este repositorio podr&aacute; realizar la comunicación con los demás usuarios y contar con la ayuda de los administradores. </p>
    <p>&nbsp;</p>
    <h2>Video de registro</h2>
	<video controls>
  		<source src="{{asset('videos/help_7VideoRegistroConfirmacion.mp4')}}">
	</video>
@endsection