@extends('layouts.app')

@section('title', 'Crear ova')

@section('content')

	@include('admin.template.partials.errors')
	{!! Form::open(['route' => 'ovas.ovamember.store','method' => 'POST', 'files' => true]) !!}
		@include('admin.template.partials.fieldsova')
		<div class="form-group">
			{!! Form::submit('Crear',['class' => 'btn btn-primary']) !!}
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
			placeholder_text_single: 'Seleccione la categoría adecuada';
			no_results_text: 'No se encontro esta categoria';
		});
	</script>
	
@endsection