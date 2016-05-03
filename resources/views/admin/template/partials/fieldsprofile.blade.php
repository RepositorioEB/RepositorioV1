<!-- Campos para perfil-->
<div class="form-group">
	<h3>{!! Form::label('name','Nombre',['class' => 'label label-primary']) !!}</h3>
	{!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Nombre completo (Minimo 4 caracteres)','required']) !!}
</div>
<div class="form-group">
	<h3>{!! Form::label('characteristic','Característica',['class' => 'label label-primary']) !!}</h3>
	{!! Form::textarea('characteristic', null, ['class' => 'form-control','placeholder' => 'Caracteristicas (Minimo 20 caracteres)']) !!}
</div>