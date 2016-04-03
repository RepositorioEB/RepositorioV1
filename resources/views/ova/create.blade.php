@extends('layouts.app')

@section('title', 'Crear ova')

@section('content')

	@include('admin.template.partials.errors')
	{!! Form::open(['route' => 'ovas.ovamember.store','method' => 'POST', 'files' => true]) !!}
		@include('admin.template.partials.fieldsova')
		<div class="form-group">
			<center>
			<a href="#ventana1" class="btn btn-warning" data-toggle="modal">Guardar</a>
            <div class="modal fade" id="ventana1">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button tyle "submit" class="close" data-dismiss="modal" aria-hiden="true">&times;</button>
                    <h3 class="modal-title">Aviso</h3>
                </div>
                <div class="modal-body">
                    <p>Se realizará una solicitud para que el administrador acepte subir el OVA al repositorio.</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" title="Boton registro" class="btn btn-primary">
                        Aceptar
                    </button>
                </div>
            </div>
            </div>
            </div>
			</center>
		</div>
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