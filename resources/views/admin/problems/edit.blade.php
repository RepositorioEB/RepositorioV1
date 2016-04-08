@extends('layouts.app')

@section('title', 'Editar problema '.$problems->name)

@section('content')
	
	@include('admin.template.partials.errors')
	{!! Form::model($problems, ['route' => ['admin.problems.update',$problems->id],'method' => 'PUT']) !!}     <!-- Formulario para modificar el problema-->
		@include('admin.template.partials.fieldsproblem') <!-- Traer capor de problemas-->
		<div class="form-group">
			<center>
			{!! Form::submit('Editar',['class' => 'btn btn-warning']) !!}          <!-- Boton modificar problema-->
			<a href="{{ route('admin.problems.index') }}" class="btn btn btn-warning" title="Cancelar modificación" name="Cancelar">Cancelar</a> <!-- Enlace para cancelar problemas-->
			</center>
		</div>
	{!! Form::close() !!}
	
@endsection