<div class="form-group">
	{!! Form::label('name','Nombre') !!}
	{!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Nombres completos','required']) !!}
</div>
<div class="form-group">
	{!! Form::label('last_name','Apellido') !!}
	{!! Form::text('last_name', null, ['class' => 'form-control','placeholder' => 'Apellidos completos']) !!}
</div>
<div class="form-group">
	{!! Form::label('username','Nombre de usuario') !!}
	{!! Form::text('username', null, ['class' => 'form-control','placeholder' => 'Nombre de usuario','required']) !!}
</div>
<div class="form-group">
	{!! Form::label('email','Correo Electronico') !!}
	{!! Form::email('email', null, ['class' => 'form-control','placeholder' => 'example@mail.com','required']) !!}
</div>
<div class="form-group">
	{!! Form::label('gender','Genero') !!}
	{!! Form::select('gender', ['man' => 'Hombre', 'woman' => 'Mujer'], null, ['class' => 'form-control  select-gender','required']) !!}
</div>
<div class="form-group">
	{!! Form::label('date','Fecha de nacimiento') !!}
	{!! Form::input('date', 'date', null, ['class' => 'form-control', 'placeholder' => 'Date','required'])!!}
</div>
<div class="form-group">
	{!! Form::label('studies','Estudios') !!}
	{!! Form::textarea('studies', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('state','Estado del usuario') !!}
	{!! Form::select('state', [ false => 'Solicitud', true => 'Activo'], null, ['class' => 'form-control select-state','required']) !!}
</div>
<div class="form-group">
	{!! Form::label('country','Pais') !!}
	{!! Form::text('country', null, ['class' => 'form-control','placeholder' => 'Pais']) !!}
</div>
<div class="form-group">
	{!! Form::label('profile_id','Perfil') !!}
	{!! Form::select('profile_id', $profiles, null, ['class' => 'form-control select-profiles','required']) !!}
</div>