<!-- Campos del foro-->
<div class="form-group">
	<h3>{!! Form::label('name','Nombre',["class"=>"label label-primary"]) !!}</h3>
	{!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Nombre completo (Minimo 5 caracteres)','required']) !!}
</div>
<div class="form-group">
	<h3>{!! Form::label('characteristic','Caracteristicas',["class"=>"label label-primary"]) !!}</h3>
	{!! Form::textarea('characteristic', null, ['class' => 'form-control','placeholder' => 'Características (Minimo 20 caracteres)']) !!}
</div>