@extends('layouts.app')

@section('title', 'Lista de discapacidades')

@section('content')
	
	<article>
		<div>
			<ul>
				@foreach($profiles as $profile)    <!-- Ciclo de los perfiles-->
					<li><a href="">{{ $profile->name }}</a></li>     <!-- Enlace con el nombre de los perfiles-->
				@endforeach
			</ul>
		</div>
		<div class="text-center">
			{!! $profiles->render() !!}      <!-- Paginacion de perfiles-->
		</div>
	</article>
	

@endsection
