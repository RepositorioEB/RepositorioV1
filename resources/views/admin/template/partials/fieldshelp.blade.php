<div class="form-group">
	{!! Form::label('name','Nombre') !!}
	{!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Nombres completos','required']) !!}
</div>
<div class="form-group">
	{!! Form::label('video','Enlace') !!}
	{!! Form::text('video', null, ['class' => 'form-control','placeholder' => 'Enlace del video','required']) !!}
</div>
<div class="form-group">
	{!! Form::label('description','Descripcion') !!}
	{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>