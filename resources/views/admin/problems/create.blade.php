@extends('layouts.app')

@section('title', 'Crear problema')

@section('content')

	@include('admin.template.partials.errors')
	{!! Form::open(['route' => 'admin.problems.store','method' => 'POST']) !!}
		@include('admin.template.partials.fieldsproblem')
		<div class="form-group">
			{!! Form::submit('Crear',['class' => 'btn btn-primary']) !!}
			<a href="{{ route('admin.problems.index') }}" class="btn btn btn-primary" title="Cancelar" name="Cancelar">Cancelar</a>
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