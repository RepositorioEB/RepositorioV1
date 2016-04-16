@extends('layouts.app')

@section('title', 'Crear ova')

@section('content')

	@include('admin.template.partials.errors')
	{!! Form::open(['route' => 'ovas.ovamember.store','method' => 'POST', 'files' => true]) !!}  <!-- Formulario para crear ovas-->
		@include('admin.template.partials.fieldsova', ['routes' => 'create'])   <!-- Traer campos de ova-->
		
		<div class="form-group">
			<center>
			<!-- Enlace para guardar el ova-->
            <script type="text/javascript">
            document.write("<a href='#ventana1' class='btn btn-warning' data-toggle='modal'>");
            document.write("Guardar");
            document.write("</a>");
            </script>
            
            <div class="modal fade" id="ventana1">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button tyle "submit" class="close" data-dismiss="modal" aria-hiden="true">&times;</button>
                    <h3 class="modal-title"><label for="aviso"> Aviso</label></h3>   
                </div>
                <div class="modal-body">
                	<!-- Campo de texto con el avison de solicitud ova-->
                	{!! Form::text('aviso', 'Se realizará una solicitud para que el administrador acepte subir el OVA al repositorio.', ['id'=>'aviso','class' => 'form-control','readonly'=>'readonly']) !!}
                </div>
                <div class="modal-footer">
                	<!-- Boton para aceptar el mensaje de aviso-->
                    <button type="submit" title="Boton registro" class="btn btn-warning">
                    	Aceptar
                    </button>
                </div>
            </div>
            </div>
            </div>
			</center>
		</div>
		<noscript>
            <center>
            Cuando se almacene el ova se realizará la solicitud para que el administrador permita subirlo al repositorio.
            <br><br>
            <button type='submit' title='Boton registro' class='btn btn-warning'>
                Guardar
            </button>
            </center>
        </noscript>
	{!! Form::close() !!}
	
@endsection

@section('js')

	<script>
		$('.select-types').chosen({
			placeholder_text_single: 'Seleccione el tipo adecuado';
			no_results_text: 'No se encontro este tipo';
		});
		$('.select-categories').chosen({
			placeholder_text_single: 'Seleccione la categoría adecuada';
			no_results_text: 'No se encontro esta categoria';
		});
	</script>
	
@endsection