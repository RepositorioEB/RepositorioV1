@extends('layouts.app')

@section('title', 'Registrar problema')

@section('content')

	@include('admin.template.partials.errors')
	{!! Form::open(['route' => 'admin.problems.store','method' => 'POST']) !!}           <!-- Formulario para registrar nuevo problema-->
		@include('admin.template.partials.fieldsproblem')
		<div class="form-group">
			<center>
			{!! Form::submit('Registrar',['class' => 'btn btn-warning']) !!}    <!-- Boton registrar problema-->
			<a href="{{ route('admin.problems.index') }}" class="btn btn btn-warning" title="Cancelar problema" name="Cancelar">Cancelar</a>        <!-- Enlace para cancelar el registro de problema-->
 			</center>
		</div>
	{!! Form::close() !!}
	
@endsection

@section('js')

	<script>
		$('.select-state').chosen({
			placeholder_text_single: 'Seleccione el estado adecuado';
		});
	</script>
	
@endsection