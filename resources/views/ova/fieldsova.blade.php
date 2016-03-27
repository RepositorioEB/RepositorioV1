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
	<select class="form-control " id="sel1" name="estrellas">
    		<option>1</option>
    		<option>2</option>
    		<option>3</option>
    		<option>4</option>
    		<option>5</option>
  	</select>
	<div class="form-group pull-right">
		{!! Form::submit('Evaluar',['class' => 'btn btn-primary']) !!}
	</div>
	