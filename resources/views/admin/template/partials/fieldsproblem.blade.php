<div class="form-group">
	{!! Form::label('description','Descripcion') !!}
	{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('state','Estado del problema') !!}
	{!! Form::select('state', [ false => 'Sin resolver', true => 'Resuelto'], null, ['class' => 'form-control select-state','required']) !!}
</div>