@extends('layouts.app')

@section('title', 'Lista categoria de ovas')

@section('content')
	
	@include('admin.template.partials.errors')
	<div class="table-responsive">
		<br />
		<a href="../ovas/menu" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"> Volver</span></a>
		<h3><legend>Búsqueda por: Categoria</legend></h3>
		<br />
		<center>
		<table class="table table-striped">
			<thead>
					<th><big><b><center>Nombre</center></b></big></th>
					<th><big><b><center>Descripción</center></b></big></th>
			</thead>
		@foreach($categories as $category)
				<tbody>
					<tr>
						<td>
							{!! Form::open(['route' =>['ovas.category.show', $category->id] , 'method' => 'GET']) !!}
								{!! Form::submit($category->name ,['class' => 'btn btn-warning']) !!}
							{!! Form::close() !!}	
						</td>
						<td>
							{{$category->description}}<br><br>
						</td>
					</tr>
				</tbody>
		@endforeach
		</table>
		</center>
	</div>
	<div class="text-center">
		{!! $categories->render() !!}
	</div>
@endsection