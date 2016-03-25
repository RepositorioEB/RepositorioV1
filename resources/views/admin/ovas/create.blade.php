@extends('layouts.app')

@section('title', 'Crear ova')

@section('content')

	@include('admin.template.partials.errors')
	{!! Form::open(['route' => 'admin.ovas.store','method' => 'POST', 'files' => true]) !!}
		@include('admin.template.partials.fieldsova')
		<div class="form-group">
			{!! Form::submit('Crear',['class' => 'btn btn-primary']) !!}
			<a href="{{ route('admin.ovas.index') }}" class="btn btn btn-primary" title="Cancelar" name="Cancelar">Cancelar</a>
		</div>
	{!! Form::close() !!}
	
@endsection

@section('js')

	<script>
		$('.select-types').chosen({
			placeholder_text_single: 'Seleccione el tipo adecuado';
			no_results_text: 'No se encontro este tipo';
		});
		$('.select-categories').chosen({
			placeholder_text_single: 'Seleccione el categoria adecuado';
			no_results_text: 'No se encontro este categoria';
		});
	</script>
	
@endsection