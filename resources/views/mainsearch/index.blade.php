@extends('layouts.app')

@section('title', 'Búsqueda principal')

@section('content')
	<div class="table-responsive">
	<?php
		$var = 0;
	?>
	@foreach($ovasname as $ovaname)
		@if($ovaname->state ==1)
			<?php
				$var = 1;
			?>
		@endif
	@endforeach
	@if($var==1)
	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Ovas por nombre</legend>
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($ovasname as $ovaname)
				@if($ovaname->state ==1)
				<tr>
					<td>{{$ovaname->name}}</td>
					<td align="right">
						<a href="{{ route('ovas.ova.show', $ovaname->id) }}" class="btn btn-warning" title="Ver OVA"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Ver</span></a>
					</td>
				</tr>
				@endif
			@endforeach
		</tbody>	
	</table>
	@endif
	
	
	<?php
		$var = 0;
	?>
	@foreach($ovasdescription as $ovadescription)
		@if($ovadescription->state ==1)
			<?php
				$var = 1;
			?>
		@endif
	@endforeach
	@if($var==1)
	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Ovas por descripcion</legend>
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($ovasdescription as $ovadescription)
				@if($ovadescription->state ==1)
				<tr>
					<td>{{$ovadescription->name}}</td>
					<td>{{$ovadescription->description}}</td>
					<td align="right">
						<a href="{{ route('ovas.ova.show', $ovadescription->id) }}" class="btn btn-warning" title="Ver OVA"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Ver</span></a>
					</td>
				</tr>
				@endif
			@endforeach
		</tbody>	
	</table>
	@endif

	<?php
		$var = 0;
	?>
	@foreach($ovasarchive as $ovaarchive)
		@if($ovaarchive->state ==1)
			<?php
				$var = 1;
			?>
		@endif
	@endforeach
	@if($var==1)
	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Ovas por archivo</legend>
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Archivo</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($ovasarchive as $ovaarchive)
				@if($ovaarchive->state ==1)
				<tr>
					<td>{{$ovaarchive->name}}</td>
					<td>{{$ovaarchive->archive}}</td>
					<td align="right">
						<a href="{{ route('ovas.ova.show', $ovaarchive->id) }}" class="btn btn-warning" title="Ver OVA"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Ver</span></a>
					</td>
				</tr>
				@endif
			@endforeach
		</tbody>	
	</table>
    @endif

	<?php
		$var = 0;
	?>
	@foreach($ovascategory as $ovacategory)
			<?php
				$var = 1;
			?>
	@endforeach
	@if($var==1)
	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Ovas por categoria</legend>
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($ovascategory as $ovacategory)
				<tr>
					<td>{{$ovacategory->name}}</td>
					<td align="right">
						<a href="{{ route('ovas.category.show', $ovacategory->id) }}" class="btn btn-warning" title="Ver OVA"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Ver</span></a>
					</td>
				</tr>
			@endforeach
		</tbody>	
	</table>
    @endif
	
    <?php
		$var = 0;
	?>
	@foreach($ovastype as $ovatype)
			<?php
				$var = 1;
			?>
	@endforeach
	@if($var==1)
	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Ovas por tipo</legend>
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($ovastype as $ovatype)
				<tr>
					<td>{{$ovatype->name}}</td>
					<td align="right">
						<a href="{{ route('ovas.type.show', $ovatype->id) }}" class="btn btn-warning" title="Ver OVA"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Ver</span></a>
					</td>
				</tr>
			@endforeach
		</tbody>	
	</table>
	@endif

	<?php
		$var = 0;
	?>
	@foreach($categoriesdescription as $categorydescription)
			<?php
				$var = 1;
			?>
	@endforeach
	@if($var==1)
	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Descripción categoría</legend>
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($categoriesdescription as $categorydescription)
				<tr>
					<td>{{$categorydescription->name}}</td>
					<td>{{$categorydescription->description}}</td>
					<td align="right">
						<a href="{{ route('ovas.category.show', $categorydescription->id) }}" class="btn btn-warning" title="Ver Categoría"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Ver</span></a>
					</td>
				</tr>
			@endforeach
		</tbody>	
	</table>
	@endif

	<?php
		$var = 0;
	?>
	@foreach($typesdescription as $typedescription)
			<?php
				$var = 1;
			?>
	@endforeach
	@if($var==1)
	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Descripción tipo</legend>
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($typesdescription as $typedescription)
				<tr>
					<td>{{$typedescription->name}}</td>
					<td>{{$typedescription->description}}</td>
					<td align="right">
						<a href="{{ route('ovas.type.show', $typedescription->id) }}" class="btn btn-warning" title="Ver Tipo"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Ver</span></a>
					</td>
				</tr>
			@endforeach
		</tbody>	
	</table>
	@endif

	<?php
		$var = 0;
	?>
	@foreach($forumsname as $forumname)
			<?php
				$var = 1;
			?>
	@endforeach
	@if($var==1)
	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Foros por nombre</legend>
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($forumsname as $forumname)
				<tr>
					<td>{{$forumname->name}}</td>
					<td align="right">
					    <a href="{{ route('foro.foros_usuarios.message',['forum_id'=>$forumname->id,'user_id'=>Auth::user()->id]) }}" class="btn btn-warning" title="Seleccionar Foro"><span class="glyphicon glyphicon-ok" aria-hidden="true">Seleccionar</span></a>
	    			</td>
				</tr>
			@endforeach
		</tbody>	
	</table>
	@endif
	
	<?php
		$var = 0;
	?>
	@foreach($forumscharacteristic as $forumcharacteristic)
			<?php
				$var = 1;
			?>
	@endforeach
	@if($var==1)
	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Foros por caracteristicas</legend>
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Características</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($forumscharacteristic as $forumcharacteristic)
				<tr>
					<td>{{$forumcharacteristic->name}}</td>
					<td>{{$forumcharacteristic->characteristic}}</td>
					<td align="right">
					    <a href="{{ route('foro.foros_usuarios.message',['forum_id'=>$forumcharacteristic->id,'user_id'=>Auth::user()->id]) }}" class="btn btn-warning" title="Seleccionar Foro"><span class="glyphicon glyphicon-ok" aria-hidden="true">Seleccionar</span></a>
	    			</td>
				</tr>
			@endforeach
		</tbody>	
	</table>
	@endif

	<?php
		$var = 0;
	?>
	@foreach($helpsname as $helpname)
			<?php
				$var = 1;
			?>
	@endforeach
	@if($var==1)
	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Ayudas por nombre</legend>
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($helpsname as $helpname)
				<tr>
					<td>{{$helpname->name}}</td>
					<td align="right">
						<a href="{{ route('helps.helps.show', $helpname->id) }}" class="btn btn-warning" title="Ver Ayuda"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Ver</span></a>
					</td>
				</tr>
			@endforeach
		</tbody>	
	</table>
	@endif

	<?php
		$var = 0;
	?>
	@foreach($helpsvideo as $helpvideo)
			<?php
				$var = 1;
			?>
	@endforeach
	@if($var==1)
	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Ayudas por video</legend>
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Video</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($helpsvideo as $helpvideo)
				<tr>
					<td>{{$helpvideo->name}}</td>
					<td>{{$helpvideo->video}}</td>
					<td align="right">
						<a href="{{ route('helps.helps.show',$helpvideo->id) }}" class="btn btn-warning" title="Ver Ayuda"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Ver</span></a>
					</td>
				</tr>
			@endforeach
		</tbody>	
	</table>
	@endif
	
	<?php
		$var = 0;
	?>
	@foreach($helpsdescription as $helpdescription)
			<?php
				$var = 1;
			?>
	@endforeach
	@if($var==1)
	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Ayudas por descripción</legend>
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($helpsdescription as $helpdescription)
				<tr>
					<td>{{$helpdescription->name}}</td>
					<td>{{$helpdescription->description}}</td>
					<td align="right">
						<a href="{{ route('helps.helps.show',$helpdescription->id) }}" class="btn btn-warning" title="Ver Ayuda"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Ver</span></a>
					</td>
				</tr>
			@endforeach
		</tbody>	
	</table>
	@endif

	<div class="text-center">
	    {!! $ovasdescription->appends(array('search' => $_GET['search']))->links()!!}
    </div>
	</div>
@endsection