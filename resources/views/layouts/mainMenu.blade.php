<ul class="nav navbar-nav">

	<li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Home</a></li>

	@foreach($menuItems as $item)

	<li class="{{ Request::is(ltrim($item->getURL(), '/')) ? 'active' : $item->getURL() }}">
		@if(count($item->getChildren()) > 0)
			<a href="{{ $item->getURL() }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				{{ $item->name() }}
				<span class="caret"></span>
			</a>
			<ul class="dropdown-menu">
				<li class="visible-xs-block">
					<a href="{{ $item->getURL() }}">{{ $item->name() }}</a>
				</li>

				@foreach($item->getChildren() as $child)

				<li>

					<a href="{{ $child->getURL() }}">{{ $child->name() }}</a>

				</li>

				@endforeach

			</ul>
		@else

		<a href="{{ $item->getURL() }}">{{ $item->name() }}</a>

		@endif
	</li>

	@endforeach

</ul>

<ul class="nav navbar-nav navbar-right">
	<li>@include('layouts.partials.language')</li>
</ul>
