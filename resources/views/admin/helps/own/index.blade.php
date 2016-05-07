@extends('layouts.app')            <!--Extender las herramientas que se utilizan en todas las ventanas-->

@section('title', 'Ayudas propias')              <!-- Seccion titulo de la pagina-->

@section('content')               <!-- Inicio de contenido-->

	@include('admin.template.partials.errors')                <!-- Revisar errores ventana-->
	<div class="table-responsive">                           <!-- Clase para adaptacion movil-->
	<a href="{{ route('admin.helps.create') }}" class="btn btn-info">Registrar nueva ayuda</a>     <!-- Enlace para registrar nueva ayuda-->
		<?php
			$i=0;
		?>
		@foreach($helps as $help)              <!-- Ciclo de ayudas-->
			@if($help->user_id == Auth::user()->id)          <!-- Comparacion con la identificacion del usuario-->
				<?php
					$i=1;
				?>	
			@endif    <!-- Fin de condicional-->
		@endforeach     <!-- Fin ciclo-->
		@if($i==1)
		<table class="table table-striped">           <!-- Table con estilo-->
			<thead>                  <!-- Cabeza tabla-->
				<th>Nº</th>               <!-- Nombre columna-->
				<th>Nombre</th>       <!-- Nombre columna-->
				<th>Descripción</th>
				<th>Video</th>
				<th>Acción</th>
			</thead>
			<tbody>         <!-- Cuerpo tabla-->
				<?php
					$cont = 1;          //Contador
				?>
				@foreach($helps as $help)              <!-- Ciclo de ayudas-->
					@if($help->user_id == Auth::user()->id)          <!-- Comparacion con la identificacion del usuario-->
					<tr>
						<td>{!! $cont++; !!}</td>            <!-- Contador-->
						<td>{{ $help->name }}</td>         <!-- Nombre de la ayuda-->
						<td>{!! $replace=str_replace("\r","<br>",$help->description); !!}</td>     <!-- Descripcion de la ayuda-->
						<td><video width="300" controls>
  								<source src="{{asset('videos/'.$help->video.'')}}">
							</video>
						</td>
						<td>
							<a href="{{ route('admin.helps.edit', $help->id) }}" class="btn btn-warning" title="Editar ayuda"><span class="glyphicon glyphicon-wrench" aria-hidden="true">Editar</span></a>            <!-- Enlace para editar la ayuda-->
							<a href="{{ route('admin.helps.destroy', $help->id) }}" onclick="return confirm('¿Seguro que quieres eliminarlo?')" class="btn btn-danger" title="Eliminar ayuda"><span class="glyphicon glyphicon-trash" aria-hidden="true">Eliminar</span></a>           <!-- Enlace para eliminar la ayuda-->
						</td>
					</tr>
					@endif        <!-- Fin condicional-->
				@endforeach     <!-- Fin ciclo-->
			</tbody>	
		</table>
		<div class="text-center">
			{!! $helps->render() !!}          <!-- Paginacion de ayudas-->
		</div>
		@else
			<h3><legend>&nbsp;&nbsp;&nbsp;No se encontró ningún elemento.</legend></h3>		
		@endif
	</div>
	
@endsection        <!-- Fin de contenido-->