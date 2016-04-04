@extends('layouts.app')

@section('title', 'Registrar ova')

@section('content')

	@include('admin.template.partials.errors')
	{!! Form::open(['route' => 'admin.ovas.store','method' => 'POST', 'files' => true]) !!}
		@include('admin.template.partials.fieldsova')
		<div class="form-group">
			<h3>{!! Form::label('state','Estado',['class' => 'label label-primary']) !!}</h3>
			{!! Form::select('state', [ false => 'Solicitud', true => 'Subido'], null, ['class' => 'form-control select-state','required']) !!}
		</div>
		<div class="form-group">
			<center>
			{!! Form::submit('Registrar',['class' => 'btn btn-warning']) !!}
			<a href="{{ route('admin.ovas.index') }}" class="btn btn btn-warning" title="Cancelar registro" name="Cancelar">Cancelar</a>
			</center>
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