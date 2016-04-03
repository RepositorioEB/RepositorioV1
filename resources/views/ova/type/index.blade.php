@extends('layouts.app')

@section('title', 'Lista tipos de ovas')

@section('content')
	
	@include('admin.template.partials.errors')
	<div class="table-responsive">
		<br />
		<a href="../ovas/menu" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"> Volver</span></a>
		<h3><legend> Búsqueda por: Tipo</legend></h3>
		<br />
		<center>
		<table class="table table-striped">
			<thead>
					<th><big><b><center>Nombre</center></b></big></th>
					<th><big><b><center>Descripción</center></b></big></th>
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
							{{$type->description}}<br><br>
						</td>
					</tr>
			</tbody>
		@endforeach
		</table>
		</center>
	</div>
	<div class="text-center">
		{!! $types->render() !!}
	</div>
@endsection