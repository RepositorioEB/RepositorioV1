@extends('layouts.app')

@section('title', 'Datos del ova '.$ova->name)

@section('content')

	@include('admin.template.partials.errors')

	{!! Form::open( ['route' => ['ovas.ova.store'],'method' => 'POST', 'files' => true]) !!}    <!-- Formulario para traer datos de ova-->
	
	<center><legend><h2>DATOS COMPLETOS DEL OVA</h2></legend></center>
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
				{!! Form::text('language', \App\Language::languageCode($ova->language), ['class' => 'form-control','readonly'=>'readonly']) !!}
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
	<!-- Consultar si el ova ya ha sido evaluado-->
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
	<legend>Calificación</legend>
	@if($var== 0)  <!-- Condicion si el ova no ha sido evaluado-->
		<fieldset>
		<div class="form-group pull-right">
		<h3><legend class="label label-primary"> Número de estrellas : </legend></h3>
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
		</div>
  		
		</fieldset>
		<div class="form-group pull-right">
		{!! Form::submit('Evaluar',['class' => 'btn btn-warning']) !!}   <!-- Boton evaluar-->
		</div>	
	@else  <!--Condicion si el ova ya fue evalaudo -->
		<div class="form-group">
			{!! Form::text('punctuation', $punctuation, ['title'=>'Calificación','class' => 'form-control','readonly'=>'readonly']) !!}
		</div>
		<div class="form-group pull-right">
			{!! Form::submit('Evaluar',['class' => 'btn btn-warning','disabled']) !!}   <!-- Boton evaluar deshabilitado-->
 		</div>
	@endif
	
	{!! Form::close() !!}	
	<br>
	<h3><legend>Comentarios</legend><h3>
	<div id="conversation" style="background: white;color: black;height:200px; border: 1px solid #CCCCCC; padding: 10px;  border-radius: 13px; overflow-x: hidden;">
    @foreach($ovas_comments as $ova_comment)     <!-- Ciclo comentarios ova-->
		@if($ova_comment->ova_id == $ova->id)
			<br>
			<div style="border-top: 1px solid black;">
			<h4>
			<?php
				if(($ova_comment->user->photo) == null)   //Condicion si el usuario ya tiene foto
                {
                    echo "<img alt='Foto".$ova_comment->id."' src='".asset('images/users/userdefect.png')."' width=50 height=50>";
                }else{
                    echo "<img alt='Foto".$ova_comment->id."' src='".asset('images/users/'.$ova_comment->user->photo.'')."' width=50 height=50>";
                }    
            ?>
			<div class="label label-danger" name="nombreusuario">{{$ova_comment->user->username}}:<span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></div>
			{{$ova_comment->comment}}   <!-- Mostrar comentario ova-->
			<div class="label label-primary">{{$ova_comment->created_at}}</div></h4>
			</div>
		@endif	
	@endforeach
	</div>
	<h3>{!! Form::label('comment','Ingrese el comentario',["class"=>"label label-primary"]) !!}</h3>
	<!-- Formulario para comentar el ova-->
	{!! Form::open( ['route' => ['ovas.ova_comment.store','ova_slug'=>$ova->slug],'method' => 'POST', 'files' => true]) !!}		
		<!-- Campo de texto para ingresar el comentario-->
		{!! Form::text('comment', null, ['title'=>'Comentario','class' => 'form-control','placeholder'=>'Ingrese el comentario']) !!}
		<div class="form-group pull-right">
			<!-- Boton para registrar el comentario-->
			{!! Form::submit('Comentar',['class' => 'btn btn-warning']) !!}
		</div>
	{!! Form::close() !!}
	<!-- Formulario para realizar la descarga del ova-->
	{!! Form::open( ['route' => ['ovas.downloads.store','ova_id'=>$ova->id],'method' => 'POST', 'files' => true]) !!}		
	<div class="form-group">
		<h3>{!! Form::label('archive','Archivo',["class"=>"label label-primary"]) !!}
			<br><br>
			<center>
				<!-- Campo del nombre del ova-->
				{!! Form::text('archive', $ova->archive, ['title'=>'Archivo','class' => 'form-control','readonly'=>'readonly']) !!}
			</center>	
		</h3>
	</div>
	<center>{!! Form::submit('Descargar',['class' => 'btn btn-warning']) !!}</center>       <!-- Boton para realizar la descarga del ova-->
	{!! Form::close() !!}
	
@endsection