@extends('layouts.app')

@section('title', 'Ovas recientes')

@section('content')
	
	@include('admin.template.partials.errors')
	<div class="table-responsive">
	<center>
	@if(count($ovas)>0)
		<table>
		<thead>
			<th><h4><legend>Nombre</legend></h4></th>
			<th><center><h4><legend>Acción</legend></h4></center></th>
		</thead>
		<tbody>
			@foreach($ovas as $ova)        <!-- Ciclo de ovas-->
				<tr>	
					<td><h3><legend><span class="glyphicon glyphicon-file" aria-hidden="true"></span>  {{ $ova->name }}  &nbsp;&nbsp;&nbsp;</legend></h3></td>  <!-- Mostrar nombre ova-->
					<td>
					    <a href="{{ route('ovas.ova.show', $ova->slug) }}" class="btn btn-warning" title="Seleccionar OVA">    <span class="glyphicon glyphicon-ok" aria-hidden="true"> Seleccionar</span></a>     <!-- Enlace para seleccio-nar el ova-->					
    				</td>
				</tr>
			@endforeach
		</tbody>	
		</table>
	@else
		<h3><legend>&nbsp;&nbsp;&nbsp;No se encontró ningún elemento.</legend></h3>			
	@endif
	</center>
	</div>
@endsection