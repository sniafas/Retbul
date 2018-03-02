<!DOCTYPE HTML> 
<html lang="en">
	<head>
    	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>@yield('title')</title>
		<link rel="stylesheet" href="{{ URL::to('src/css/main.css') }}">
		<link rel="stylesheet" href="{{ asset('src/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('src/css/bootstrap-theme.min.css') }}">
		<link rel="stylesheet" href="{{ asset('src/lightbox/src/css/lightbox.css') }}">
		
		<!-- Fonts -->
		<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="{{ URL::to('src/css/font-awesome-4.6.3/css/font-awesome.min.css') }}">
		
		@yield('styles')
		<meta name="csrf-token" content="{{ csrf_token() }}" />
	</head>

	<body>
		<nav class="navbar navbar-default">
		<div class="container">
		<div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('home')}}">RetBul</a>
            </div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}">Home</a></li>
					<li><a href="{{ route('offline')}}">Offline</a></li>
					<li><a href="{{ route('online')}}">Online</a></li>
					<li><a href="{{ route('download') }}">Downloads</a></li>
					<li><a href="{{ route('elastic') }}">Elastic</a></li>
					<li><a href="{{ route('about')}}">About</a></li>
				</ul>
			</div>
		</div>
		</div>
		</nav>
		
		@yield('content')

	<footer class="footer">
    	<div class="container">    	
            <span style="float:left; padding-top: 16px;">
                Developed by <a href="http://sniafas.eu">Stavros Niafas </a>
            </span>
            <span style="float:right">Powered with<img src="{{ asset('img/okeanos.png') }}"></img> </span> 
    	</div>
    </footer>
	<!-- Scripts -->
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-80735586-1', 'auto');
	  ga('send', 'pageview');

	</script>

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script  src="{{ asset('src/lightbox/src/js/lightbox.js') }}"></script>
	</body>
</html>