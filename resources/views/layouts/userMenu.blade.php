<ul>

	@if($user->canManage())
	
	<li>
		<a href="/admin">
			admin menu
		</a>
	</li>

	@endif

	<li>
		<a href="{{ route('logout') }}"
			onclick="event.preventDefault();
			document.getElementById('logout-form').submit();">
			{{ __('auth.logout') }}
		</a>
	</li>

	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		{{ csrf_field() }}
	</form>

</ul>
