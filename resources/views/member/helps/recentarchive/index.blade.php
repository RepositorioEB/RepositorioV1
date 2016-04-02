@extends('layouts.app')

@section('title', 'Ayudas recientes')

@section('content')
	
	@include('admin.template.partials.errors')
	<center>
		<table>
		<thead>
			<th><h4><legend>Nombre</legend></h4></th>
			<th><center><h4><legend>Acción</legend></h4></center></th>
		</thead>
		<tbody>
			@foreach($helps as $help)
				<tr>	
					<td><h3><legend><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"> {{ $help->name }}  &nbsp;&nbsp;&nbsp;</span></legend></h3></td>
					<td>
					    <a href="{{ route('member.helps.show', $help->id) }}" class="btn btn-warning" title="Seleccionar Ayuda">    <span class="glyphicon glyphicon-ok" aria-hidden="true"> Seleccionar</span></a>   					
    				</td>
				</tr>
			@endforeach
		</tbody>	
		</table>
	</center>
@endsection