@extends('layouts.app')

@section('title', 'Registrar descarga')

@section('content')

	@include('admin.template.partials.errors')
	{!! Form::open(['route' => 'admin.downloads.store','method' => 'POST']) !!}
		@include('admin.template.partials.fieldsdownload')
		<div class="form-group">
			<center>
			{!! Form::submit('Registrar',['class' => 'btn btn-warning']) !!}
			<a href="{{ route('admin.downloads.index') }}" class="btn btn btn-warning" title="Cancelar registro" name="Cancelar">Cancelar</a>
			</center>
		</div>
	{!! Form::close() !!}
	
@endsection

@section('js')

	<script>
		$('.select-ovas').chosen({
			placeholder_text_single: 'Seleccione el ova adecuado';
			search_contains: true;
			no_results_text: 'No se encontro este ova';
		});
	</script>
	
@endsection