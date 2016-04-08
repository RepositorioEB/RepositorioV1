<!-- Campos de contraseña de usuario-->
<div class="form-group">
	{!! Form::label('password','Contraseña actual') !!}
	{!! Form::password('password', ['class' => 'form-control','placeholder' => '*********','required','min:8']) !!}
</div>
<div class="form-group">
	{!! Form::label('newpassword','Contraseña nueva') !!}
	{!! Form::password('newpassword', ['class' => 'form-control','placeholder' => '*********','required','min:8']) !!}
</div>
<div class="form-group">
	{!! Form::label('newpassword2','Confirme contraseña') !!}
	{!! Form::password('newpassword2', ['class' => 'form-control','placeholder' => '*********','required','min:8']) !!}
</div>