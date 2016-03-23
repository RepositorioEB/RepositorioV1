<div class="form-group">
	{!! Form::label('name','Nombre') !!}
	{!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Nombre completo','required']) !!}
</div>
<div class="form-group">
	{!! Form::label('language','Lenguaje') !!}
	{!! Form::text('language', null, ['class' => 'form-control','placeholder' => 'Escriba el lenguaje','required']) !!}
</div>
<div class="form-group">
	{!! Form::label('description','Descripcion') !!}
	{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
		{!! Form::label('archive','Archivo') !!}
		{!! Form::text('archive', null, ['class' => 'form-control','readonly'=>'readonly']) !!}
		<input type="file" class="form-control" name="archive2" >	
</div>
<div class="form-group">
	{!! Form::label('type_id','Tipo') !!}
	{!! Form::select('type_id', $types, null, ['class' => 'form-control select-types','required']) !!}
</div>
<div class="form-group">
	{!! Form::label('category_id','Categoria') !!}
	{!! Form::select('category_id', $categories, null, ['class' => 'form-control select-categories','required']) !!}
</div>