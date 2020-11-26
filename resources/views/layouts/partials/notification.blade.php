@if(Session::has('notification'))
	<div class="notification notification--{{ Session::get('notification')['type'] }}">
		{{ Session::get('notification')['body'] }}
	</div>
@endif
<!-- For JS usage -->
<div class="notification notification--unused">
</div>
