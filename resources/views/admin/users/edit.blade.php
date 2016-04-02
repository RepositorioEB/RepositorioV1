@extends('layouts.app')

@section('title', 'Editar usuario '.$users->name)

@section('content')

	@include('admin.template.partials.errors')
	
	{!! Form::model($users, ['route' => ['admin.users.update',$users->id],'method' => 'PUT']) !!}
		@include('admin.template.partials.fieldsuser', ['routes' => 'edit'])
		<div class="form-group">
			{!! Form::submit('Editar',['class' => 'btn btn-warning']) !!}
			<a href="{{ route('admin.users.index') }}" class="btn btn btn-warning" title="Cancelar modificación" name="Cancelar">Cancelar</a>
		</div>
	{!! Form::close() !!}
	
@endsection