@extends('layouts.app')

@section('title', 'Lista de categorias')

@section('content')

	@include('admin.template.partials.errors')
	<div class="table-responsive">
		<a href="{{ route('admin.categories.create') }}" class="btn btn-info">Registrar nueva categoría</a>
		<table class="table table-striped">
			<thead>
				<th>Id</th>
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Acción</th>
			</thead>
			<tbody>
				@foreach($categories as $category)
					<tr>
						<td>{{ $category->id }}</td>
						<td>{{ $category->name }}</td>
						<td>{{ $category->description }}</td>
						<td>
							<a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning" title="Editar categoría"><span class="glyphicon glyphicon-wrench" aria-hidden="true" >Editar</span></a>
							<a href="{{ route('admin.categories.destroy', $category->id) }}" onclick="return confirm('¿Seguro que quieres eliminarlo?')" class="btn btn-danger" title="Eliminar categoría"><span class="glyphicon glyphicon-trash" aria-hidden="true">Eliminar</span></a>
						</td>
					</tr>
				@endforeach
			</tbody>	
		</table>
	</div>
	<div class="text-center">
		{!! $categories->render() !!}
	</div>
	
@endsection