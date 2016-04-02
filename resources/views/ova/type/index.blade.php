@extends('layouts.app')

@section('title', 'Lista tipos de ovas')

@section('content')
	
	@include('admin.template.partials.errors')
		<br />
		<a href="../ovas/menu" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"> Volver</span></a>
		<h3><legend> Búsqueda por: Tipo</legend></h3>
		<br />
		<center>
		<table>
			<thead>
				<tr>
					<td><big><b><center>Nombre</center></b></big></td>
					<td><big><b><center>Descripción</center></b></big></td>
				</tr>
			</thead>
		@foreach($types as $type)
			<tbody>
					<tr>
						<td>
							{!! Form::open(['route' =>['ovas.type.show', $type->id] , 'method' => 'GET']) !!}
							{!! Form::submit($type->name ,['class' => 'btn btn-warning']) !!}
							{!! Form::close() !!}	
						</td>
						<td>
							&nbsp;&nbsp;{{$type->description}}
						</td>
					</tr>
				</tbody>
		@endforeach
		</table>
		</center>
@endsection