@extends('layouts.app')

@section('title', 'Datos del ova '.$ova->name)

@section('content')

	@include('admin.template.partials.errors')
	<a href="{{ route('ovas.ova.index') }}" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"> Volver</span></a>

	{!! Form::open( ['route' => ['ovas.ova.store'],'method' => 'POST', 'files' => true]) !!}
	<center><label><h2>DATOS COMPLETOS DEL OVA</h2></label></center>
	<div class="form-group">
		<h3>{!! Form::label('id','Identificación: ',["class"=>"label label-primary"]) !!}
			<br><br>
			<center>
				{!! Form::text('id', $ova->id, ['class' => 'form-control','readonly'=>'readonly']) !!}
			</center>	
		</h3>
	</div>
	<div class="form-group">
		<h3>{!! Form::label('name','Nombre: ',["class"=>"label label-primary"]) !!}
			<br><br>
			<center>
				{!! Form::text('name', $ova->name, ['class' => 'form-control','readonly'=>'readonly']) !!}
			</center>	
		</h3>
	</div>
	<div class="form-group">
		<h3>{!! Form::label('language','Lenguaje: ',["class"=>"label label-primary"]) !!}
			<br><br>
			<center>
				{!! Form::text('language',$ova->language , ['class' => 'form-control','readonly'=>'readonly']) !!}
			</center>
		</h3>
	</div>
	<div class="form-group">
		<h3>{!! Form::label('description','Descripción',["class"=>"label label-primary"]) !!}
			<br><br>
			<center>
				{!! Form::textarea('description', $ova->description, ['class' => 'form-control','readonly'=>'readonly']) !!}
			</center>
		</h3>
	</div>
	<div class="form-group">
		<h3>{!! Form::label('archive','Archivo',["class"=>"label label-primary"]) !!}
			<br><br>
			<center>
				{!! Form::text('archive', $ova->archive, ['class' => 'form-control','readonly'=>'readonly']) !!}
			</center>	
		</h3>
	</div>
	<div class="form-group">
		<h3>{!! Form::label('type','Tipo',["class"=>"label label-primary"]) !!}
			<br><br>
			<center>
				{!! Form::text('type', $ova->type->name, ['class' => 'form-control','readonly'=>'readonly']) !!}
			</center>	
		</h3>
	</div>
	<div class="form-group">
		<h3>{!! Form::label('category','Categoría',["class"=>"label label-primary"]) !!}
			<br><br>
			<center>
				{!! Form::text('category', $ova->category->name, ['class' => 'form-control','readonly'=>'readonly']) !!}
			</center>	
		</h3>
	</div>
	<div class="form-group pull-right">
		<h4><label class="label label-primary"> Número de estrellas : </label></h4>
	</div>
  	<br><br><br>
	<p class="clasificacion">
       <input id="radio1" type="radio" name="estrellas" value="5"><!--
    --><label for="radio1">★5</label><!--
    --><input id="radio2" type="radio" name="estrellas" value="4"><!--
    --><label for="radio2">★4</label><!--
    --><input id="radio3" type="radio" name="estrellas" value="3"><!--
    --><label for="radio3">★3</label><!--
    --><input id="radio4" type="radio" name="estrellas" value="2"><!--
    --><label for="radio4">★2</label><!--
    --><input id="radio5" type="radio" name="estrellas" value="1"><!--
    --><label for="radio5">★1</label>
	</p>
	
	<div class="form-group pull-right">
		{!! Form::submit('Evaluar',['class' => 'btn btn-primary']) !!}
	</div>
	{!! Form::close() !!}	
	<?php
		$text=asset('storage/')."/".$ova->archive;
	
	?>
	<a href="{{$text}}">{!! Form::submit('Descargar',['class' => 'btn btn-primary']) !!}</a>
	
@endsection