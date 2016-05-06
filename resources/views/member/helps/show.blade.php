@extends('layouts.app')

@section('title', 'Ayuda')

@section('content')
	
	<section>
		<div>
			<header><h1>{{ 'Nombre de la ayuda: '.$help->name }}</h1></header> 
			<article>
				<p>{!! $replace=str_replace("\r","<br>",$help->description); !!}</p>  <!-- Descripcion de la ayuda-->
			</article>
		</div>
	</section> 
	<section>
		<h2>Video</h2>
		<video controls autoplay>
  			<source src="{{asset('videos/'.$help->video.'')}}">
		</video>
	</section>
	<section>
		<div id="disqus_thread"></div>
		<script>   //Script para opinar la ayuda
		/**
		* RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
		* LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
		*/
		/*
		var disqus_config = function () {
		this.page.url = PAGE_URL; // Replace PAGE_URL with your page's canonical URL variable
		this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
		};
		*/
		(function() { // DON'T EDIT BELOW THIS LINE
		var d = document, s = d.createElement('script');

		s.src = '//ovarepository.disqus.com/embed.js';

		s.setAttribute('data-timestamp', +new Date());
		(d.head || d.body).appendChild(s);
		})();
		</script>
	</section>
@endsection