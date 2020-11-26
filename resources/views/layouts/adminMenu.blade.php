<h3>Lacustris</h3>
<ul>
	<a href="/"><li>{{ __( 'general.home' ) }}</li></a>
	<a href="/admin/menu"><li>{{ __( 'admin.menuAdmin' ) }}</li></a>
	<a href="/admin/pages"><li>{{ __( 'admin.pageAdmin' ) }}</li></a>
	<a href="/admin/posts"><li>{{ __( 'admin.postAdmin' ) }}</li></a>
	<a href="/admin/sponsors"><li>{{ __( 'admin.sponsorAdmin' ) }}</li></a>
	@if(Auth::user()->role > 7)
	<a href="/admin/user"><li>{{ __( 'admin.userAdmin' ) }}</li></a>
	@endif
	<a href="/admin/events"><li>{{ __( 'admin.eventAdmin' ) }}</li></a>
	<a href="/admin/competitions"><li>{{ __( 'admin.competitionAdmin' ) }}</li></a>
</ul>
