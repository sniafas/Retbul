<!DOCTYPE HTML> 
<html lang="en">
	<head>
    	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>RetBul</title>
		<link rel="stylesheet" href="{{ URL::to('css/main.css') }}">
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
		<link rel="stylesheet" href="{{ asset('lightbox/src/css/lightbox.css') }}">
		
		<!-- Fonts -->
		<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="{{ URL::to('css/font-awesome-4.6.3/css/font-awesome.min.css') }}">
		<meta name="csrf-token" content="{{ csrf_token() }}" />
 		<script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>		
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
						<li><a href="{{ url('https://www.flickr.com/photos/139433384@N07/') }}">Dataset</a></li>
						<li><a href="{{ route('about')}}">About</a></li>
						@if(Auth::user())
							<li><a href="{{ route('dashboard')}}">Dashboard</a></li>
						@endif
					</ul>
					<!-- Right Side Of Navbar -->
					<ul class="nav navbar-nav navbar-right">
						<!-- Authentication Links -->						
						@guest
						<li><a href="{{ route('register') }}">Register</a></li>
						@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
								{{ Auth::user()->name }} <span class="caret"></span>
							</a>

							<ul class="dropdown-menu">
								<li>
									<a href="{{ route('logout') }}"
									onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
									Logout
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</li>
						</ul>
					</li>
					@endguest						
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
		<script src="{{ asset('js/app.js') }}"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="{{asset('lightbox/src/js/lightbox.js') }}"></script>

	</body>
</html>