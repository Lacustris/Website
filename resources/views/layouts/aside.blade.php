<aside class="">
	<h3>{{ __('general.ourSponsors') }}</h3>
	<div>
		<img src="http://placehold.it/350x150">
	</div>

	<h3>{{ __('events.agenda') }}</h3>

	@if(Auth::check())

	<h3>{{ __('auth.logout') }}</h3>
	Je bent ingelogd als {{ Auth::user()->name }}<br>
	@include('layouts.userMenu')

	@else

	@include('auth.login')
	
	@endif
</aside>
