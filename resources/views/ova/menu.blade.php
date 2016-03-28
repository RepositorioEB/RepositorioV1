@extends('layouts.app')

@section('title', 'Lista de Busqueda')

@section('content')
	
	@include('admin.template.partials.errors')
		<br />
		<h3><label class="label label-info">Selección de búsqueda:</label></h3>
		<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="{{ route('ovas.ova.index') }}" class="btn btn-warning" title="Seleccionar"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"> Búsqueda General</span></a>
    	<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    	<a href="../ovas/ovas" class="btn btn-warning" title="Seleccionar"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"> Búsqueda por OVAS</span></a>
    	<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    	<a href="{{ route('ovas.type.index') }}" class="btn btn-warning" title="Seleccionar"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"> Búsqueda por Tipos</span></a>
    	<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    	<a href="{{ route('ovas.category.index') }}" class="btn btn-warning" title="Seleccionar"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"> Búsqueda por Categoria</span></a>
    	<br />
@endsection