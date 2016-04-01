@extends('layouts.app')

@section('title', 'Editar usuario '.$users->name)

@section('content')

	@include('admin.template.partials.errors')
	
	{!! Form::model($users, ['route' => ['admin.users.update',$users->id],'method' => 'PUT']) !!}
		@if(\Auth::user()->id == $users->id)
			@include('admin.template.partials.fieldsuser', ['routes' => 'edit', 'variable' => 'no'])
		@else
			@include('admin.template.partials.fieldsuser', ['routes' => 'edit', 'variable' => 'si'])
		@endif
		<div class="form-group">
			{!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}
			<a href="{{ route('admin.users.index') }}" class="btn btn btn-primary" title="Cancelar" name="Cancelar">Cancelar</a>
		</div>
	{!! Form::close() !!}
	
@endsection