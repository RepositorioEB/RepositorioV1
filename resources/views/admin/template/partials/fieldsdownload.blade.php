<!-- Campos para descargas-->
<div class="form-group">
	<h3>{!! Form::label('ova_id','Ova',['class'=>'label label-primary']) !!}</h3>
	{!! Form::select('ova_id', $ovas, null, ['class' => 'form-control select-ovas','required']) !!}
</div>