@extends('layouts.app')

@section('title', 'Ayudas recientes')

@section('content')
	
	@include('admin.template.partials.errors')
	<div class="table-responsive">
	<center>
	@if(count($helps)>0)
		<table>
		<thead>
			<th><h4><legend>Nombre</legend></h4></th>
			<th><center><h4><legend>Acción</legend></h4></center></th>
		</thead>
		<tbody>
			@foreach($helps as $help)          <!-- Ciclo de ayudas-->
				<tr>	
					<td><h3><legend><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"> </span>  {{ $help->name }}  &nbsp;&nbsp;&nbsp;</legend></h3></td>  <!-- Mostrar nombre ayuda-->
					<td>
					    <a href="{{ route('helps.show', $help->id) }}" class="btn btn-warning" title="Seleccionar Ayuda">    <span class="glyphicon glyphicon-ok" aria-hidden="true"> Seleccionar</span></a>   			<!-- Enlace para seleccionar la ayuda que desea consultar-->		
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