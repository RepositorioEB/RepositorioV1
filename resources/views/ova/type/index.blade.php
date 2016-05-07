@extends('layouts.app')

@section('title', 'Lista tipos de ovas')

@section('content')
	
	@include('admin.template.partials.errors')
	<div class="table-responsive">
		<br />
		<a href="../ovas/menu" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"> Volver</span></a>  <!-- Enlace para volver al menu de ovas-->
		<h3><legend> Búsqueda por: Tipo</legend></h3>
		<br />
		<center>
		@if(count($types)>0)
		<table class="table table-striped">
			<thead>
					<th><big><b><center>Nombre</center></b></big></th>
					<th><big><b><center>Descripción</center></b></big></th>
			</thead>
		@foreach($types as $type)    <!-- Ciclo de tipos de ova-->
			<tbody>
					<tr>
						<td>
							{!! Form::open(['route' =>['ovas.type.show', $type->id] , 'method' => 'GET']) !!}     <!-- Formulario para mostrar los ovas con ese tipo-->
  							{!! Form::submit($type->name ,['class' => 'btn btn-warning']) !!}  <!-- Boton con el tipo de ovas-->
							{!! Form::close() !!}	
						</td>
						<td>
							{{$type->description}}<br><br>   <!-- Descripcion del tipo de ova-->
						</td>
					</tr>
			</tbody>
		@endforeach
		</table>
		</center>
		<div class="text-center">
		{!! $types->render() !!}     <!-- Paginacion de tipos de ova-->
		</div>
		@else
			<br><br><br><br>
			<h3><legend>&nbsp;&nbsp;&nbsp;No se encontró ningún elemento.</legend></h3>	
		@endif
	</div>
@endsection