@extends('layouts.app')

@section('title', 'Editar typo '.$types->name)

@section('content')
	
	@include('admin.template.partials.errors')
	{!! Form::model($types, ['route' => ['admin.types.update',$types->id],'method' => 'PUT']) !!}
		@include('admin.template.partials.fieldstype')
		<div class="form-group">
			<center>
			{!! Form::submit('Editar',['class' => 'btn btn-warning']) !!}
			<a href="{{ route('admin.types.index') }}" class="btn btn btn-warning" title="Cancelar modificación" name="Cancelar">Cancelar</a>
			</center>
		</div>
	{!! Form::close() !!}
	
@endsection