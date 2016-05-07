@extends('layouts.app')

@section('title', 'Foros recientes')

@section('content')
	
	@include('admin.template.partials.errors')
	<div class="table-responsive">
	<center>
		@if(count($forums)>0)
		<table>
		<thead>
			<th><h4><legend>Nombre</legend></h4></th>
			<th><center><h4><legend>Acción</legend></h4></center></th>
		</thead>
		<tbody>
			@foreach($forums as $forum)  <!-- Ciclo de foros-->
				<tr>	
					<td><h3><legend><span class="glyphicon glyphicon-comment" aria-hidden="true"> </span>  {{ $forum->name }}  &nbsp;&nbsp;&nbsp;</legend></h3></td> <!-- Mostrar nombre del foro-->
					<td>
					    <a href="{{ route('foro.foros_usuarios.message',['forum_id'=>$forum->id,'user_id'=>Auth::user()->id]) }}" class="btn btn-warning" title="Seleccionar Foro"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Seleccionar</span></a> <!-- Enlace para seleccionar el foro-->
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