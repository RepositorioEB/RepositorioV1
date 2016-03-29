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
				{!! Form::select( 'language', \App\Language::languageList(), $ova->language, ['title' =>'Seleccionar lenguaje','class' => 'form-control','readonly'=>'readonly','disabled']) !!}
				<!--{!! Form::text('language',$ova->language , ['class' => 'form-control','readonly'=>'readonly']) !!}-->
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
	<div class="form-group">
		<h3>{!! Form::label('user','Usuario',["class"=>"label label-primary"]) !!}
			<br><br>
			<center>
				{!! Form::text('user', $ova->user->username, ['class' => 'form-control','readonly'=>'readonly']) !!}
			</center>	
		</h3>
	</div>
	<?php
		$var=0;
		$punctuation=0;
		foreach($ovas_evaluations as $ova_evaluation)
		{	
			if(($ova_evaluation->user_id == Auth::user()->id) AND ($ova_evaluation->ova_id == $ova->id))
			{
				$var=1;
				$punctuation = $ova_evaluation->punctuation; 
			}
		}
	?>
	<h3>{!! Form::label('calification','Calificación',["class"=>"label label-primary"]) !!}</h3>		
	@if($var== 0)
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
		{!! Form::submit('Evaluar',['class' => 'btn btn-warning']) !!}
		</div>	
	@else
		<div class="form-group">
			{!! Form::text('punctuation', $punctuation, ['title'=>'Calificación','class' => 'form-control','readonly'=>'readonly']) !!}
		</div>
		<div class="form-group pull-right">
			{!! Form::submit('Evaluar',['class' => 'btn btn-warning','disabled']) !!}
		</div>
	@endif
	
	{!! Form::close() !!}	
	<br>
	<h3>{!! Form::label('comments','Comentarios',["class"=>"label label-primary"]) !!}</h3>
	<div id="conversation" style="background: white;color: black;height:200px; border: 1px solid #CCCCCC; padding: 10px;  border-radius: 13px; overflow-x: hidden;">
    @foreach($ovas_comments as $ova_comment)
		@if($ova_comment->ova_id == $ova->id)
			<br>
			<div style="border-top: 1px solid black;">
			<br>
			<?php
				if(($ova_comment->user->photo) == null)
                {
                    echo "<img alt='Foto' src='".asset('images/users/userdefect.png')."' width=50 height=50 title='Foto'>";
                }else{
                    echo "<img alt='Foto' src='".asset('images/users/'.$ova_comment->user->photo.'')."' width=50 height=50 title='Foto'>";
                }    
            ?>
			<label class="label label-danger" name="nombreusuario" alt="2">{{$ova_comment->user->username}}:<span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></label>
			{{$ova_comment->comment}}
			<label class="label label-primary">{{$ova_comment->created_at}}</label>
			<br>
			</div>
		@endif	
	@endforeach
	</div>
	<br>
	{!! Form::open( ['route' => ['ovas.ova_comment.store','ova_id'=>$ova->id],'method' => 'POST', 'files' => true]) !!}		
		{!! Form::text('comment', null, ['title'=>'Comentario','class' => 'form-control','placeholder'=>'Ingrese el comentario']) !!}
		<div class="form-group pull-right">
			{!! Form::submit('Comentar',['class' => 'btn btn-warning']) !!}
		</div>
	{!! Form::close() !!}
	{!! Form::open( ['route' => ['ovas.downloads.store','ova_id'=>$ova->id],'method' => 'POST', 'files' => true]) !!}		
	<div class="form-group">
		<h3>{!! Form::label('archivelb','Archivo',["class"=>"label label-primary"]) !!}
			<br><br>
			<center>
				{!! Form::text('archive', $ova->archive, ['title'=>'Archivo','class' => 'form-control','readonly'=>'readonly']) !!}
			</center>	
		</h3>
	</div>
	{!! Form::submit('Descargar',['class' => 'btn btn-warning']) !!}
	{!! Form::close() !!}
	
@endsection