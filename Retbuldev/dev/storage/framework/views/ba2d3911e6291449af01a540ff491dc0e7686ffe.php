<!DOCTYPE HTML> 
<html lang="en">
	<head>
    	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>RetBul</title>
		<link rel="stylesheet" href="<?php echo e(URL::to('css/main.css')); ?>">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
		<!-- Fonts -->
		<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
 		<script>window.Laravel = { csrfToken: '<?php echo e(csrf_token()); ?>' }</script>		
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
	                <a class="navbar-brand" href="<?php echo e(route('home')); ?>">RetBul</a>
	            </div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo e(url('/')); ?>">Home</a></li>
						<li><a href="<?php echo e(route('offline')); ?>">Offline</a></li>
						<li><a href="<?php echo e(url('https://www.flickr.com/photos/139433384@N07/')); ?>">Dataset</a></li>
						<li><a href="<?php echo e(route('about')); ?>">About</a></li>
						<?php if(Auth::user()): ?>
							<li><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
						<?php endif; ?>
					</ul>
					<!-- Right Side Of Navbar -->
					<ul class="nav navbar-nav navbar-right">
						<!-- Authentication Links -->						
						<?php if(auth()->guard()->guest()): ?>
						<li><a href="<?php echo e(route('register')); ?>">Register</a></li>
						<?php else: ?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
								<?php echo e(Auth::user()->name); ?> <span class="caret"></span>
							</a>

							<ul class="dropdown-menu">
								<li>
									<a href="<?php echo e(route('logout')); ?>"
									onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
									Logout
								</a>

								<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
									<?php echo e(csrf_field()); ?>

								</form>
							</li>
						</ul>
					</li>
					<?php endif; ?>						
					</ul>
				</div>
			</div>
		</div>			
		</nav>		
		<?php echo $__env->yieldContent('content'); ?>
		<footer class="footer">
			<div class="container">    	
				<span style="float:left; padding-top: 16px;">
					Developed by <a href="http://sniafas.eu">Stavros Niafas </a>
				</span>
				<span style="float:right">Powered with<img src="<?php echo e(asset('img/okeanos.png')); ?>"></img> </span> 
			</div>
		</footer>
		<!-- Scripts -->
		<script src="<?php echo e(asset('js/app.js')); ?>"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	</body>
</html>