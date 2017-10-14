<aside class="">
	<h3>{{ __('general.ourSponsors') }}</h3>
	<div class="carousel" data-carousel data-carousel-origin="sponsors">
		<img class="carousel__image" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="" data-carousel-target="#" data-action="carousel-goto">
	</div>

	<h3>{{ __('events.agenda') }}</h3>

	@include('layouts.partials.agenda')

	@if(Auth::check())

	<h3>{{ __('auth.logout') }}</h3>
	{{ __( 'auth.loggedInAs', ['name' => Auth::user()->name ] ) }}</br>
	@include('layouts.userMenu')

	@else

	@include('auth.login')
	
	@endif
</aside>
