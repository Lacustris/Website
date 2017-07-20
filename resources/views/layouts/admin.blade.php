<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Lacustris - @yield ( 'title', 'Admin' )</title>

		<!-- Fonts -->
	
		<!-- Styles -->
		<link href="{{ mix('/css/app.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ mix('/css/font-awesome.css') }}" rel="stylesheet" type="text/css">

		<!-- Scripts -->
		<script src="{{ mix('/js/manifest.js') }}"></script>
		<script src="{{ mix('/js/vendor.js') }}"></script>
		<script src="{{ mix('/js/app.js') }}"></script>

		<!-- Page Specific Files -->
		@yield ('header')

	</head>

	<body>

		<a id="top"></a>
		<div class="admin-page">
			<div class="admin-page__menu">
				@include('layouts.adminMenu')
			</div>
			<div class="admin-page__content">
				@yield ('contents')
			</div>
		</div>
		<div class="admin-page__to-top">
			<a href="#top">{{ __( 'general.toTop' ) }}</a>
		</div>

		@include('layouts.dialogs.confirm')
	</body>
</html>
