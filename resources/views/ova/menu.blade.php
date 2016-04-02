@extends('layouts.app')

@section('title', 'Lista de Busqueda')

@section('content')
	
	@include('admin.template.partials.errors')
		<br />
        <fieldset>
		<h3><legend>&nbsp;&nbsp;&nbsp;Selección de búsqueda</legend></h3>
		<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="{{ route('ovas.ova.index') }}" class="btn btn-warning" title="Botón búsqueda general"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"> Búsqueda General</span></a>
    	<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    	<a href="../ovas/ovas" class="btn btn-warning" title="Botón búsqueda por OVAS"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"> Búsqueda por OVAS</span></a>
    	<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    	<a href="{{ route('ovas.type.index') }}" class="btn btn-warning" title="Botón búsqueda por tipos"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"> Búsqueda por Tipos</span></a>
    	<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    	<a href="{{ route('ovas.category.index') }}" class="btn btn-warning" title="Botón búsqueda por categorías"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"> Búsqueda por Categoria</span></a>
    	</fieldset>
        <br />
@endsection