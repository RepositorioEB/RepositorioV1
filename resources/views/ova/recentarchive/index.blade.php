@extends('layouts.app')

@section('title', 'Lista de ovas')

@section('content')
	
	@include('admin.template.partials.errors')
	<center>
		<table>
		<thead>
			<th><h4><label class="label label-default">Nombre</label></h4></th>
			<th><center><h4><label class="label label-default">Acción</label></h4></center></th>
		</thead>
		<tbody>
			@foreach($ovas as $ova)
				<tr>	
					<td><h3><label class="label label-primary"><span class="glyphicon glyphicon-file" aria-hidden="true"> {{ $ova->name }}</span></label></h3></td>
					<td><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					    <a href="{{ route('ovas.ova.show', $ova->id) }}" class="btn btn-warning" title="Seleccionar"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Seleccionar</span></a>   					
    				</td>
				</tr>
			@endforeach
		</tbody>	
		</table>
	</center>
@endsection