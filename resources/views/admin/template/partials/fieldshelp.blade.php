<div class="form-group">
	<h3>{!! Form::label('name','Nombre',['class'=>'label label-primary']) !!}</h3>
	{!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Nombres completos','required']) !!}
</div>
<div class="form-group">
	<h3>{!! Form::label('video','Enlace',['class'=>'label label-primary']) !!}</h3>
	{!! Form::text('video', null, ['class' => 'form-control','placeholder' => 'Enlace del video','required']) !!}
</div>
<div class="form-group">
	<h3>{!! Form::label('description','Descripcion',['class'=>'label label-primary']) !!}</h3>
	{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>