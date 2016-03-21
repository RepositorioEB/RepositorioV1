@extends('layouts.app')

@section('title', 'Lista de discapacidades')

@section('content')
	
	<article>
		<div>
			<ul>
				@foreach($profiles as $profile)
					<li><a href="">{{ $profile->name }}</a></li>
				@endforeach
			</ul>
		</div>
		<div class="text-center">
			{!! $profiles->render() !!}
		</div>
	</article>
	

@endsection
