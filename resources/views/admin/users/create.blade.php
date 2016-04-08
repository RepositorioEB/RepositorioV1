@extends('layouts.app')

@section('title', 'Registrar usuario')

@section('content')

	@include('admin.template.partials.errors')
	
	{!! Form::open(['route' => 'admin.users.store','method' => 'POST', 'files' => true]) !!}   <!-- Formulario para registrar nuevo usuario-->
		@include('admin.template.partials.fieldsuser', ['routes' => 'create', 'variable' => 'si'])
		<div class="form-group">
			<center>{!! Form::submit('Registrar',['class' => 'btn btn-warning']) !!}   <!-- Boton registrar usuario-->
			<a href="{{ route('admin.users.index') }}" class="btn btn btn-warning" title="Cancelar registro" name="Cancelar">Cancelar</a>
			</center>
		</div>
	{!! Form::close() !!}

@endsection

@section('js')

	<script>		
		$('.select-state').chosen({
			placeholder_text_single: 'Seleccione el estado adecuado';
		});
		$('.select-role').chosen({
			placeholder_text_single: 'Seleccione el rol adecuado';
		});
		$('.select-country').chosen({
			placeholder_text_single: 'Seleccione el pais adecuado';
		});
		$('.select-profiles').chosen({
			placeholder_text_single: 'Seleccione la discapacidad adecuado';
			search_contains: true;
			no_results_text: 'No se encontro esta discapacidad';
		});
		$('.select-gender').chosen({
			placeholder_text_single: 'Seleccione su genero';
		});
	</script>
	
@endsection