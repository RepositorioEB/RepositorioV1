<!-- Campos de categoria-->
<div class="form-group">
	<h3>{!! Form::label('name','Nombre',['class'=>'label label-primary']) !!}</h3>
	{!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Nombre completo (Minimo 5 caracteres)','required']) !!}
</div>
<div class="form-group">
	<h3>{!! Form::label('description','Descripción',['class'=>'label label-primary']) !!}</h3>
	{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>