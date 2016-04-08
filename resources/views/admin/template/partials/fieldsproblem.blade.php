<!-- Campos para problema-->
<div class="form-group">
	<h3>{!! Form::label('name','Nombre',['class'=>'label label-primary']) !!}</h3>
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	<h3>{!! Form::label('description','Descripción',['class'=>'label label-primary']) !!}</h3>
	{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	<h3>{!! Form::label('state','Estado del problema',['class'=>'label label-primary']) !!}</h3>
	{!! Form::select('state', [ false => 'Sin resolver', true => 'Resuelto'], null, ['class' => 'form-control select-state','required']) !!}
</div>