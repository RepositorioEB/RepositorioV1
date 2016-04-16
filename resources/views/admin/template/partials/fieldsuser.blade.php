<!-- Campos para usuarios-->
<div class="form-group">
	<h3>{!! Form::label('name','Nombre',["class"=>"label label-primary"]) !!}</h3> 
	{!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Nombres completos','required']) !!}
</div>
<div class="form-group">
	<h3>{!! Form::label('last_name','Apellido',["class"=>"label label-primary"]) !!}</h3>
	{!! Form::text('last_name', null, ['class' => 'form-control','placeholder' => 'Apellidos completos']) !!}
</div>
@if($routes == 'create')
	<div class="form-group">
		<h3>{!! Form::label('username','Nombre de usuario',["class"=>"label label-primary"]) !!}</h3>
		{!! Form::text('username', null, ['class' => 'form-control','placeholder' => 'Nombre de usuario','required']) !!}
	</div>
	<div class="form-group">
		<h3>{!! Form::label('email','Correo Electrónico',["class"=>"label label-primary"]) !!}</h3>
		{!! Form::email('email', null, ['class' => 'form-control','placeholder' => 'example@mail.com','required']) !!}
	</div>
	<div class="form-group">
		<h3>{!! Form::label('password','Contraseña',["class"=>"label label-primary"]) !!}</h3>
		{!! Form::password('password', ['class' => 'form-control','placeholder' => '*********','required']) !!}
	</div>
@endif
<div class="form-group">
	<h3>{!! Form::label('gender','Género',["class"=>"label label-primary"]) !!}</h3>
	{!! Form::select('gender', ['man' => 'Hombre', 'woman' => 'Mujer'], null, ['class' => 'form-control  select-gender','required']) !!}
</div>
@if($routes == 'create')
	<div class="form-group">
		<h3>{!! Form::label('date','Fecha de nacimiento',["class"=>"label label-primary"]) !!}</h3>
		{!! Form::input('date', 'date', null, ['class' => 'form-control', 'placeholder' => 'Date','required'])!!}
	</div>
	<div class="form-group">
		<h3>{!! Form::label('photo','Foto',["class"=>"label label-primary"]) !!}</h3>
		{!! Form::file('photo')!!}
	</div>
@endif
<div class="form-group">
	<h3>{!! Form::label('studies','Estudios',["class"=>"label label-primary"]) !!}</h3>
	{!! Form::textarea('studies', null, ['class' => 'form-control']) !!}
</div>

@if($routes == 'create')
<div class="form-group">
	<h3>{!! Form::label('country','Pais',["class"=>"label label-primary"]) !!}</h3>
	{!! Form::select('country', $country, 'CO', ['class' => 'form-control select-country','required']) !!}
</div>
@else
<div class="form-group">
	<h3>{!! Form::label('country','Pais',["class"=>"label label-primary"]) !!}</h3>
	{!! Form::select('country', $country, null, ['class' => 'form-control select-country','required']) !!}
</div>
@endif

@if($variable == 'si')
	<div class="form-group">
		<h3>{!! Form::label('role','Tipo de nivel',["class"=>"label label-primary"]) !!}</h3>
		{!! Form::select('role', [ 'member' => 'Cliente', 'admin' => 'Administrador'], null, ['class' => 'form-control select-role','required']) !!}
	</div>
@endif
@if($routes == 'create')
<div class="form-group">
	<h3>{!! Form::label('profile_id','Discapacidad',["class"=>"label label-primary"]) !!}</h3>
	{!! Form::select('profile_id', $profiles, 11, ['class' => 'form-control select-profiles','required']) !!}
</div>
@else
<div class="form-group">
	<h3>{!! Form::label('profile_id','Discapacidad',["class"=>"label label-primary"]) !!}</h3>
	{!! Form::select('profile_id', $profiles, null, ['class' => 'form-control select-profiles','required']) !!}
</div>
@endif
