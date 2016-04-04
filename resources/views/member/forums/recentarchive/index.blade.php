@extends('layouts.app')

@section('title', 'Foros recientes')

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
			@foreach($forums as $forum)
				<tr>	
					<td><h3><legend><span class="glyphicon glyphicon-comment" aria-hidden="true"> {{ $forum->name }}  &nbsp;&nbsp;&nbsp;</span></legend></h3></td>
					<td>
					    <a href="{{ route('foro.foros_usuarios.message',['forum_id'=>$forum->id,'user_id'=>Auth::user()->id]) }}" class="btn btn-warning" title="Seleccionar Foro"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Seleccionar</span></a>
	    			</td>
				</tr>
			@endforeach
		</tbody>	
		</table>
	</center>
	</div>
@endsection