@extends('layouts.app')

@section('title', 'Editar typo '.$types->name)

@section('content')
	
	@include('admin.template.partials.errors')
	{!! Form::model($types, ['route' => ['admin.types.update',$types->id],'method' => 'PUT']) !!}   <!-- Formulario para modificar los tipos de ovas-->
		@include('admin.template.partials.fieldstype')   <!-- Traer los campo de tipos de ovas-->
		<div class="form-group">
			<center>
			{!! Form::submit('Editar',['class' => 'btn btn-warning']) !!}   <!-- Boton para modificar el tipo de ovas-->
			<a href="{{ route('admin.types.index') }}" class="btn btn btn-warning" title="Cancelar modificación" name="Cancelar">Cancelar</a>   <!-- Cancelar la modificacion de tipo de ova-->
			</center>
		</div>
	{!! Form::close() !!}
	
@endsection