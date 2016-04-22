<!-- Campos para ova-->
<div class="form-group">
	<h3>{!! Form::label('name','Nombre',[ "class"=>"label label-primary"]) !!}</h3>
	{!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Nombre completo (Minimo 5 caracteres)','required']) !!}
</div>
@if($routes == 'create')
<div class="form-group">
	<h3>{!! Form::label('language','Lenguaje',["class"=>"label label-primary"]) !!}</h3>
	{!! Form::select( 'language', \App\Language::languageList(), 'es', ['title' =>'Seleccionar lenguaje','class' => 'form-control','required']) !!}
</div>
@else
<div class="form-group">
	<h3>{!! Form::label('language','Lenguaje',["class"=>"label label-primary"]) !!}</h3>
	{!! Form::select( 'language', \App\Language::languageList(), null, ['title' =>'Seleccionar lenguaje','class' => 'form-control','required']) !!}
</div>
@endif
<div class="form-group">
	<h3>{!! Form::label('description','Descripción',["class"=>"label label-primary"]) !!}</h3>
	{!! Form::textarea('description', null, ['class' => 'form-control','placeholder' => 'Descripción del OVA (Minimo 20 caracteres)']) !!}
</div>
<div class="form-group">
		<h3>{!! Form::label('archive','Archivo',["for"=>"archive","class"=>"label label-primary"]) !!}
		{!! Form::text('archive', null, ['class' => 'form-control','readonly'=>'readonly','required']) !!}
		<input type="file" id="archive" class="form-control" name="archive2"></h3>
</div>
<div class="form-group">
	<h3>{!! Form::label('type_id','Tipo',["class"=>"label label-primary"]) !!}</h3>
	{!! Form::select('type_id', $types, null, ['class' => 'form-control select-types','required']) !!}
</div>
<div class="form-group">
	<h3>{!! Form::label('category_id','Categoría',["class"=>"label label-primary"]) !!}</h3>
	{!! Form::select('category_id', $categories, null, ['class' => 'form-control select-categories','required']) !!}
</div>