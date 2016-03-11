<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link id="theme-style" rel="stylesheet" href="{{ asset('css/all.css') }}">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	@include("components.navbar")

	<div class="bg-slider-wrapper">
			<div class="flexslider bg-slider">
					<ul class="slides">
							<li class="slide slide-1"></li>
							<li class="slide slide-2"></li>
							<li class="slide slide-3"></li>
					</ul>
			</div>
	</div><!--//bg-slider-wrapper-->

	<div class="container">
			@yield('content')
	</div>

	<!-- Scripts -->
	<script type="text/javascript" src="{{ asset('js/all.js') }}"></script>
</body>
</html>
