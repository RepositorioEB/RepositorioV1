<div class="form-group">
	{!! Form::label('name','Nombre') !!}
	{!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Nombres completos','required']) !!}
</div>
<div class="form-group">
	{!! Form::label('characteristic','Caracteristicas') !!}
	{!! Form::textarea('characteristic', null, ['class' => 'form-control']) !!}
</div>