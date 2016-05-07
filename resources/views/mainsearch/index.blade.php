@extends('layouts.app')

@section('title', 'Búsqueda principal')

@section('content')
	<?php
		$var = 0;
		$varTotal = 0;	
	?>
	@foreach($ovasname as $ovaname)  <!-- Ciclo nombreova-->
		@if($ovaname->state ==1)<!-- Condicion si el ova ya has sido subido-->
			<?php
				$var = 1;     //Variable para verificar si hay ova
				$varTotal = 1;
			?>
		@endif
	@endforeach
	@if($var==1) 
	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Ovas por nombre</legend>
	<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($ovasname as $ovaname)   <!-- Ciclo nombre ova-->
				@if($ovaname->state ==1)
				<tr>
					<td>{{$ovaname->name}}</td>
					<td align="right">
						<a href="{{ route('ovas.ova.show', $ovaname->slug) }}" class="btn btn-warning" title="Ver OVA {{$ovaname->name}}"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Ver</span></a>
					</td>
				</tr>
				@endif
			@endforeach
		</tbody>	
	</table>
	</div>
	@endif
	
	
	<?php
		$var = 0;
	?>
	@foreach($ovasdescription as $ovadescription)  <!-- Ciclo para la descripcion del ova-->
		@if($ovadescription->state ==1)
			<?php
				$var = 1;
				$varTotal = 1;
			?>
		@endif
	@endforeach
	@if($var==1)
	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Ovas por descripcion</legend>
	<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($ovasdescription as $ovadescription) <!-- Ciclo para la desccripcion del ova-->
				@if($ovadescription->state ==1)   <!-- Estado del ova-->
				<tr>
					<td>{{$ovadescription->name}}</td>
					<td>{{$ovadescription->description}}</td>
					<td align="right">
						<a href="{{ route('ovas.ova.show', $ovadescription->slug) }}" class="btn btn-warning" title="Ver OVA {{$ovadescription->name}}"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Ver</span></a>
					</td>
				</tr>
				@endif
			@endforeach
		</tbody>	
	</table>
	</div>
	@endif

	<?php
		$var = 0;
	?>
	@foreach($ovasarchive as $ovaarchive)
		@if($ovaarchive->state ==1)
			<?php
				$var = 1;
				$varTotal = 1;
			?>
		@endif
	@endforeach
	@if($var==1)
	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Ovas por archivo</legend>
	<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Archivo</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($ovasarchive as $ovaarchive)   <!-- Ciclo archivos de ova-->
				@if($ovaarchive->state ==1)   <!-- Condicion estado del ova-->
				<tr>
					<td>{{$ovaarchive->name}}</td>
					<td>{{$ovaarchive->archive}}</td>
					<td align="right">
						<a href="{{ route('ovas.ova.show', $ovaarchive->slug) }}" class="btn btn-warning" title="Ver OVA {{$ovaarchive->name}}"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Ver</span></a>
					</td>
				</tr>
				@endif
			@endforeach
		</tbody>	
	</table>
    </div>
    @endif

	<?php
		$var = 0;
	?>
	@foreach($ovascategory as $ovacategory)
			<?php
				$var = 1;
				$varTotal = 1;
			?>
	@endforeach
	@if($var==1)
	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Ovas por categoria</legend>
	<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($ovascategory as $ovacategory)   <!-- Ciclo categorias de ovas-->
				<tr>
					<td>{{$ovacategory->name}}</td>
					<td align="right">
						<a href="{{ route('ovas.category.show', $ovacategory->id) }}" class="btn btn-warning" title="Ver categoría {{$ovacategory->name}}"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Ver</span></a>
					</td>
				</tr>
			@endforeach
		</tbody>	
	</table>
    </div
    >@endif
	
    <?php
		$var = 0;
	?>
	@foreach($ovastype as $ovatype)
			<?php
				$var = 1;
				$varTotal = 1;
			?>
	@endforeach
	@if($var==1)
	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Ovas por tipo</legend>
	<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($ovastype as $ovatype)       <!-- Ciclo tipos de ova-->
				<tr>
					<td>{{$ovatype->name}}</td>
					<td align="right">
						<a href="{{ route('ovas.type.show', $ovatype->id) }}" class="btn btn-warning" title="Ver Tipo {{$ovatype->name}}"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Ver</span></a>
					</td>
				</tr>
			@endforeach
		</tbody>	
	</table>
	</div>
	@endif

	<?php
		$var = 0;
	?>
	@foreach($categoriesdescription as $categorydescription)
			<?php
				$var = 1;
				$varTotal = 1;
			?>
	@endforeach
	@if($var==1)
	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Descripción categoría</legend>
	<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($categoriesdescription as $categorydescription)   <!-- Ciclo descripcion de la categoria de ovas-->
				<tr>
					<td>{{$categorydescription->name}}</td>
					<td>{{$categorydescription->description}}</td>
					<td align="right">
						<a href="{{ route('ovas.category.show', $categorydescription->id) }}" class="btn btn-warning" title="Ver Categoría {{$categorydescription->name}}"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Ver</span></a>
					</td>
				</tr>
			@endforeach
		</tbody>	
	</table>
	</div>
	@endif

	<?php
		$var = 0;
	?>
	@foreach($typesdescription as $typedescription)
			<?php
				$var = 1;
				$varTotal = 1;
			?>
	@endforeach
	@if($var==1)
	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Descripción tipo</legend>
	<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($typesdescription as $typedescription)   <!-- Descripcion de los tipos de ovas-->
				<tr>
					<td>{{$typedescription->name}}</td>
					<td>{{$typedescription->description}}</td>
					<td align="right">
						<a href="{{ route('ovas.type.show', $typedescription->id) }}" class="btn btn-warning" title="Ver Tipo {{$typedescription->name}}"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Ver</span></a>
					</td>
				</tr>
			@endforeach
		</tbody>	
	</table>
	</div>
	@endif

	<?php
		$var = 0;
	?>
	@foreach($forumsname as $forumname)
			<?php
				$var = 1;
				$varTotal = 1;
			?>
	@endforeach
	@if($var==1)
	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Foros por nombre</legend>
	<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($forumsname as $forumname)   <!-- Ciclo con los nombres de los foros-->
				<tr>
					<td>{{$forumname->name}}</td>
					<td align="right">
					    <a href="{{ route('foro.foros_usuarios.message',['forum_id'=>$forumname->id,'user_id'=>Auth::user()->id]) }}" class="btn btn-warning" title="Seleccionar Foro {{$forumname->name}}"><span class="glyphicon glyphicon-ok" aria-hidden="true">Seleccionar</span></a>
	    			</td>
				</tr>
			@endforeach
		</tbody>	
	</table>
	</div>
	@endif
	
	<?php
		$var = 0;
	?>
	@foreach($forumscharacteristic as $forumcharacteristic)
			<?php
				$var = 1;
				$varTotal = 1;
			?>
	@endforeach
	@if($var==1)
	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Foros por caracteristicas</legend>
	<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Características</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($forumscharacteristic as $forumcharacteristic)  <!--Ciclo con las caracteristicas de los foros -->
				<tr>
					<td>{{$forumcharacteristic->name}}</td>
					<td>{{$forumcharacteristic->characteristic}}</td>
					<td align="right">
					    <a href="{{ route('foro.foros_usuarios.message',['forum_id'=>$forumcharacteristic->id,'user_id'=>Auth::user()->id]) }}" class="btn btn-warning" title="Seleccionar Foro {{$forumcharacteristic->name}}"><span class="glyphicon glyphicon-ok" aria-hidden="true">Seleccionar</span></a>
	    			</td>
				</tr>
			@endforeach
		</tbody>	
	</table>
	</div>
	@endif

	<?php
		$var = 0;
	?>
	@foreach($helpsname as $helpname)
			<?php
				$var = 1;
				$varTotal = 1;
			?>
	@endforeach
	@if($var==1)
	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Ayudas por nombre</legend>
	<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($helpsname as $helpname)     <!-- Ciclo con el nombre de las ayudas-->
				<tr>
					<td>{{$helpname->name}}</td>
					<td align="right">
						<a href="{{ route('helps.show', $helpname->id) }}" class="btn btn-warning" title="Ver Ayuda {{$helpname->name}}"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Ver</span></a>
					</td>
				</tr>
			@endforeach
		</tbody>	
	</table>
	</div>
	@endif

	<?php
		$var = 0;
	?>
	@foreach($helpsvideo as $helpvideo)
			<?php
				$var = 1;
				$varTotal = 1;
			?>
	@endforeach
	@if($var==1)
	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Ayudas por video</legend>
	<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Video</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($helpsvideo as $helpvideo)   <!--Ciclo con el video de las ayudas -->
				<tr>
					<td>{{$helpvideo->name}}</td>
					<td>{{$helpvideo->video}}</td>
					<td align="right">
						<a href="{{ route('helps.show',$helpvideo->id) }}" class="btn btn-warning" title="Ver Ayuda {{$helpvideo->name}}"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Ver</span></a>
					</td>
				</tr>
			@endforeach
		</tbody>	
	</table>
	</div>
	@endif
	
	<?php
		$var = 0;
	?>
	@foreach($helpsdescription as $helpdescription)
			<?php
				$var = 1;
				$varTotal = 1;
			?>
	@endforeach
	@if($var==1)
	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Ayudas por descripción</legend>
	<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($helpsdescription as $helpdescription)   <!-- Ciclo con la descripcion de las ayudas-->
				<tr>
					<td>{{$helpdescription->name}}</td>
					<td>{!! $replace=str_replace("\r","<br>",$helpdescription->description); !!}</td>
					<td align="right">
						<a href="{{ route('helps.show',$helpdescription->id) }}" class="btn btn-warning" title="Ver Ayuda {{$helpdescription->name}}"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Ver</span></a>
					</td>
				</tr>
			@endforeach
		</tbody>	
	</table>
	</div>
	@endif
	<div class="text-center">
	    {!! $ovasdescription->appends(array('search' => $_GET['search']))->links()!!}  <!--Realizar la paginacion -->
    </div>
    @if($varTotal == 0)
    	<h3><legend>&nbsp;&nbsp;&nbsp;No se encontró ningún elemento.</legend></h3>		
	@endif
@endsection