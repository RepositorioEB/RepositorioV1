@extends('layouts.app')

@section('title', 'Ovas recientes')

@section('content')
	
	@include('admin.template.partials.errors')
	<div class="table-responsive">
	<center>
		<table>
		<thead>
			<th><h4><legend>Nombre</legend></h4></th>
			<th><center><h4><legend>Acción</legend></h4></center></th>
		</thead>
		<tbody>
			@foreach($ovas as $ova)
				<tr>	
					<td><h3><legend><span class="glyphicon glyphicon-file" aria-hidden="true"></span>  {{ $ova->name }}  &nbsp;&nbsp;&nbsp;</legend></h3></td>
					<td>
					    <a href="{{ route('ovas.ova.show', $ova->id) }}" class="btn btn-warning" title="Seleccionar OVA">    <span class="glyphicon glyphicon-ok" aria-hidden="true"> Seleccionar</span></a>   					
    				</td>
				</tr>
			@endforeach
		</tbody>	
		</table>
	</center>
	</div>
@endsection