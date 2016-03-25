@extends('layouts.app')

@section('title', 'Editar typo '.$types->name)

@section('content')
	
	@include('admin.template.partials.errors')
	{!! Form::model($types, ['route' => ['admin.types.update',$types->id],'method' => 'PUT']) !!}
		@include('admin.template.partials.fieldstype')
		<div class="form-group">
			{!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}
			<a href="{{ route('admin.types.index') }}" class="btn btn btn-primary" title="Cancelar" name="Cancelar">Cancelar</a>
		</div>
	{!! Form::close() !!}
	
@endsection