<!-- Campos de ova sin modificacion-->
<div class="form-group">
	<h3>{!! Form::label('id'.$ova->id,'Identificación: ',["class"=>"label label-primary"]) !!}
		<br><br>
		<center>
			{!! Form::text('id', $ova->id, ['id' => 'id'.$ova->id,'class' => 'form-control','readonly'=>'readonly']) !!}
		</center>	
	</h3>
</div>
<div class="form-group">
	<h3>{!! Form::label('name'.$ova->id,'Nombre: ',["class"=>"label label-primary"]) !!}
		<br><br>
		<center>
			{!! Form::text('name', $ova->name, ['id'=>'name'.$ova->id,'class' => 'form-control','readonly'=>'readonly']) !!}
		</center>	
	</h3>
</div>
<div class="form-group">
	<h3>{!! Form::label('language'.$ova->id,'Lenguaje: ',["class"=>"label label-primary"]) !!}
		<br><br> 
		<center>
			<!--{!! Form::select( 'language'.$ova->id, \App\Language::languageList(), 'es', ['title' =>'Seleccionar lenguaje','class' => 'form-control','disabled']) !!}-->
			{!! Form::text('language', \App\Language::languageCode($ova->language), ['class' => 'form-control','readonly'=>'readonly']) !!}
		</center>
	</h3>
</div>
<div class="form-group">
	<h3>{!! Form::label('description'.$ova->id,'Descripción',["class"=>"label label-primary"]) !!}
		<br><br>
		<center>
			{!! Form::textarea('description'.$ova->id, $ova->description, ['title'=>'Descripción','class' => 'form-control','readonly'=>'readonly']) !!}
		</center>
	</h3>
</div>
<!--
<div class="form-group">
	<h3>{!! Form::label('archive'.$ova->id,'Archivo',["class"=>"label label-primary"]) !!}
		<br><br>
		<center>
			{!! Form::text('archive', $ova->archive, ['id'=>'archive'.$ova->id,'class' => 'form-control','readonly'=>'readonly']) !!}
		</center>	
	</h3>
</div>
-->
<div class="form-group">
	<h3>{!! Form::label('type'.$ova->id,'Tipo',["class"=>"label label-primary"]) !!}
		<br><br>
		<center>
			{!! Form::text('type', $ova->type->name, ['id'=>'type'.$ova->id,'class' => 'form-control','readonly'=>'readonly']) !!}
		</center>	
	</h3>
</div>
<div class="form-group">
	<h3>{!! Form::label('category'.$ova->id,'Categoría',["class"=>"label label-primary"]) !!}
		<br><br>
		<center>
			{!! Form::text('category', $ova->category->name, ['id'=>'category'.$ova->id,'class' => 'form-control','readonly'=>'readonly']) !!}
		</center>	
	</h3>
</div>
<div class="form-group">
	<h3>{!! Form::label('user'.$ova->id,'Usuario',["class"=>"label label-primary"]) !!}
		<br><br>
		<center>
			{!! Form::text('user', $ova->user->username, ['id'=>'user'.$ova->id,'class' => 'form-control','readonly'=>'readonly']) !!}
		</center>	
	</h3>
</div>
<!-- Consultar si el ova ya fue evaluado-->
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
<h3>{!! Form::label('calification'.$ova->id,'Calificación',['for' => 'sel1',"class"=>"label label-primary"]) !!}</h3>		
@if($var== 0)   <!-- Condicion si el ova no ha sido consultado-->
	<select class="form-control " id="calification{{$ova->id}}" name="estrellas">
		<option>1</option>
		<option>2</option>
		<option>3</option>
		<option>4</option>
		<option>5</option>
		</select>

	<div class="form-group pull-right">
		{!! Form::submit('Evaluar',['class' => 'btn btn-warning']) !!}   <!-- Boton evaluar-->
	</div>	
@else  <!-- Condicion si el ova ya fue evaluado-->
	<div class="form-group">
		<!-- Mostrar campo de evaluacion-->
		{!! Form::text('punctuation', $punctuation, ["id"=>"calification".$ova->id, 'class' => 'form-control','readonly'=>'readonly']) !!}
	</div>
	<div class="form-group pull-right">
		{!! Form::submit('Evaluar',['class' => 'btn btn-warning','disabled']) !!}  <!-- Boton evaluar deshabilitado-->
	</div>
@endif

<br>
<h3><legend class="label label-primary">Comentarios</legend></h3>
<div id="conversation" style="background: white;color: black;height:200px; border: 1px solid #CCCCCC; padding: 12px;  border-radius: 13px; overflow-x: hidden;">
@foreach($ovas_comments as $ova_comment)     <!-- Ciclo de comentarios-->
	@if($ova_comment->ova_id == $ova->id)   <!-- Consultar los comentarios del ova-->
		<br>
		<div style="border-top: 1px solid black;">
		<br>
		<?php
			if(($ova_comment->user->photo) == null)    //Condicion si el usuario tiene foto
            {
                echo "<img alt='Foto' src='".asset('images/users/userdefect.png')."' width=50 height=50 >";
            }else{
                echo "<img alt='Foto' src='".asset('images/users/'.$ova_comment->user->photo.'')."' width=50 height=50 >";
            }    
        ?>
		<div class="label label-danger" name="nombreusuario" alt="2">{{$ova_comment->user->username}} : <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></div>
		{{$ova_comment->comment}}   <!-- Comentario del ova-->
		<div class="label label-primary">{{$ova_comment->created_at}}</div>
		<br>
		</div>
	@endif	
@endforeach
</div>
<br>
<div class="form-group pull-right">
	<a href="{{ route('ovas.ova.show', $ova->slug) }}" class="btn btn-warning" title="Seleccionar">Comentar</a>  <!-- Enlace para comentar el ova-->
</div>

