@extends('layouts.app')   <!--Extender las herramientas que se utilizan en todas las ventanas-->

@section('title', 'Creadores') <!--Seccion de titulo de la pagina-->
@section('content') <!--Inicio de contenido -->
	<br>  <!-- Salto de linea-->
    <div class="col-xs-12 col-sm-14 col-md-13 col-lg-14">          <!-- Posicion de panel-->
       	<div class="panel panel-default">                <!-- Panel principal-->
            <div class="panel-body">                   <!-- Cuerpo del panel-->
            	<div class="media">
			          	<div class="media-center">          <!-- Cuandro de imagen-->
			          		<center><img class="imag-responsive" src="/images/admin/estiven.png" width="230" height="230" name="photo" alt="braian"/></center>	<!-- Mostrar imagen de creador-->		          	
			        	</div>
			        </div>
			        
    			
    			<h3><legend class="label label-default" >Nombres:</legend></h3><h4><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Braian Estiven</h4>     <!-- Mostrar titulo e informacion de creador-->
    			<h3><legend class="label label-default">Apellidos:</legend></h3><h4><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Alvarado Rodríguez</h4>
    			<h3><legend class="label label-default">Correo:</legend></h3><h4><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> bealvarador@coreo.udistrital.edu.co</h4>
    			<h3><legend class="label label-default">Universidad:</legend></h3><h4><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Universdad Distrital Francisco José de CALDAS</h4>
    			<h3><legend class="label label-default">Facultad:</legend></h3><h4><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Tecnológica</h4>
    			<h3><legend class="label label-default">Carrera:</legend></h3><h4><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Sistematizacion de Datos</h4>
            </div>	
        </div>
    </div>
    <br><br>
    <div class="col-xs-12 col-sm-14 col-md-13 col-lg-14">
       	<div class="panel panel-default">
            <div class="panel-body">
            	<div class="media">
			          	<div class="media-center">
			          		<center><img class="imag-responsive" src="/images/admin/edison.png" width="230" height="230" name="photo" alt="edison"/></center>	<!-- Mostrar imagen de creador-->		          	
			        	</div>
			        </div>
    			<h3><legend class="label label-default" >Nombres:</legend></h3><h4><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Edison Andrés</h4> <!-- Mostrar titulo e informacion de creador-->
    			<h3><legend class="label label-default">Apellidos:</legend></h3><h4><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Quijano Suarez</h4>
    			<h3><legend class="label label-default">Correo:</legend></h3><h4><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> eaquijanos@coreo.udistrital.edu.co</h4>
    			<h3><legend class="label label-default">Universidad:</legend></h3><h4><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Universdad Distrital Francisco José de CALDAS</h4>
    			<h3><legend class="label label-default">Facultad:</legend></h3><h4><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Tecnológica</h4>
    			<h3><legend class="label label-default">Carrera:</legend></h3><h4><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Sistematizacion de Datos</h4>
            </div>	
        </div>
    </div>
@endsection  <!-- Cerrar contenido-->