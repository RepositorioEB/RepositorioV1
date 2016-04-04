@extends('layouts.app')

@section('title', 'Registrar problema')

@section('content')

	@include('admin.template.partials.errors')
	{!! Form::open(['route' => 'admin.problems.store','method' => 'POST']) !!}
		@include('admin.template.partials.fieldsproblem')
		<div class="form-group">
			<center>
			{!! Form::submit('Registrar',['class' => 'btn btn-warning']) !!}
			<a href="{{ route('admin.problems.index') }}" class="btn btn btn-warning" title="Cancelar problema" name="Cancelar">Cancelar</a>
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