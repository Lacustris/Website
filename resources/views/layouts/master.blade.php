<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Lacustris | @yield ('title') </title>

		<!-- Fonts -->
	
		<!-- Styles -->
		<link href="{{ mix('/css/app.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ mix('/css/font-awesome.css') }}" rel="stylesheet" type="text/css">

		<!-- Scripts -->
		<script src="{{ mix('/js/manifest.js') }}"></script>
		<script src="{{ mix('/js/vendor.js') }}"></script>
		<script src="{{ mix('/js/app.js') }}"></script>

	</head>

	<body>
		<header class="header">
			<div class="container-fluid">
			
				<section class="header-contents">
					@include ('layouts.header')
				</section>

				<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="170">
					@include ('layouts.navigation')
				</nav>

			</div>
		</header>
		<section class="content">
			<div class="container">
				<div class="row">

					<div class="col-xs-12 col-md-8">
						@yield ('contents')
					</div>
		
					<div class="col-md-4 col-xs-12">
						@include('layouts.aside')
					</div>

				</div>
			</div>
		</section>
	</body>
</html>
