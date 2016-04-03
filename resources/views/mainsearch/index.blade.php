@extends('layouts.app')

@section('title', 'Búsqueda principal')

@section('content')
	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Ovas por nombre</legend>
	@foreach($ovasname as $ovaname)
		&nbsp;&nbsp;&nbsp;{{$ovaname->name}} 
		<a href="{{ route('ovas.ova.show', $ovaname->id) }}" class="btn btn-warning" title="Ver OVA"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Ver</span></a>
		<br>
	@endforeach
	
	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Ovas por descripcion</legend>
	@foreach($ovasdescription as $ovadescription)
		&nbsp;&nbsp;&nbsp;{{$ovadescription->description}}
		<a href="{{ route('ovas.ova.show', $ovadescription->id) }}" class="btn btn-warning" title="Ver OVA"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Ver</span></a>
		<br>
	@endforeach
	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Ovas por archivo</legend>
	@foreach($ovasarchive as $ovaarchive)
		&nbsp;&nbsp;&nbsp;{{$ovaarchive->archive}}
		<a href="{{ route('ovas.ova.show', $ovaarchive->id) }}" class="btn btn-warning" title="Ver OVA"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Ver</span></a>
		<br>
	@endforeach
	
	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Ovas por categoria</legend>
	@foreach($ovascategory as $ovacategory)
		&nbsp;&nbsp;&nbsp;{{$ovacategory->name}}
		<a href="{{ route('ovas.category.show', $ovacategory->id) }}" class="btn btn-warning" title="Ver OVA"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Ver</span></a>
		<br>
	@endforeach

	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Ovas por tipo</legend>
	@foreach($ovastype as $ovatype)
		&nbsp;&nbsp;&nbsp;{{$ovatype->name}}
		<a href="{{ route('ovas.type.show', $ovatype->id) }}" class="btn btn-warning" title="Ver OVA"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Ver</span></a>
		<br>
	@endforeach

	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Descripción categoría</legend>
	@foreach($categoriesdescription as $categorydescription)
		&nbsp;&nbsp;&nbsp;{{$categorydescription->description}}
		<a href="{{ route('ovas.category.index') }}" class="btn btn-warning" title="Ver Categoría"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Ver</span></a>
		<br>
	@endforeach
	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Descripción tipo</legend>
	@foreach($typesdescription as $typedescription)
		&nbsp;&nbsp;&nbsp;{{$typedescription->description}}
		<a href="{{ route('ovas.type.index') }}" class="btn btn-warning" title="Ver Tipo"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Ver</span></a>
		<br>
	@endforeach

	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Foros por nombre</legend>
	@foreach($forumsname as $forumname)
		&nbsp;&nbsp;&nbsp;{{$forumname->name}}
		<a href="{{ route('foro.foros_usuarios.show', $forumname->id) }}" class="btn btn-warning" title="Ver Foro"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Ver</span></a>
		<br>
	@endforeach
	
	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Foros por caracteristicas</legend>
	@foreach($forumscharacteristic as $forumcharacteristic)
		&nbsp;&nbsp;&nbsp;{{$forumcharacteristic->characteristic}}
		<a href="{{ route('foro.foros_usuarios.show', $forumcharacteristic->id) }}" class="btn btn-warning" title="Ver Foro"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Ver</span></a>
		<br>
	@endforeach

	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Ayudas por nombre</legend>
	@foreach($helpsname as $helpname)
		&nbsp;&nbsp;&nbsp;{{$helpname->name}}
		<a href="{{ route('member.helps.show', $helpname->id) }}" class="btn btn-warning" title="Ver Ayuda"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Ver</span></a>
		<br>
	@endforeach

	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Ayudas por video</legend>
	@foreach($helpsvideo as $helpvideo)
		&nbsp;&nbsp;&nbsp;{{$helpvideo->video}}
		<a href="{{ route('helps.helps.show',$helpvideo->id) }}" class="btn btn-warning" title="Ver Ayuda"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Ver</span></a>
		<br>
	@endforeach

	<legend><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Ayudas por descripción</legend>
	@foreach($helpsdescription as $helpdescription)
		&nbsp;&nbsp;&nbsp;{{$helpdescription->description}}
		<a href="{{ route('helps.helps.show',$helpdescription->id) }}" class="btn btn-warning" title="Ver Ayuda"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Ver</span></a>
		<br>
	@endforeach
	<div class="text-center">
	    {!! $ovasdescription->appends(array('search' => $_GET['search']))->links()!!}
    </div>

@endsection