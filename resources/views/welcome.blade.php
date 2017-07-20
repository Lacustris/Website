@extends ('layouts.master')

@section('contents')

<h1>Welcome to the Lacustris Project</h1>

Things that should still be done (in no particularly useful order):
<div class="row">

	<div class="col-md-4">
		<h2>Front-End</h2>
		<ul>
			<li>Fix navigation events</li>
			<li>Properly categorise SASS</li>
			<li>Look into making admin area responsive</li>
			<li>User signup form</li>
		</ul>
	</div>

	<div class="col-md-4">
		<h2>Back-end</h2>
		<ul>
			<li>User Admin</li>
			<li>News Posts</li>
			<li>Events</li>
			<li>404 page</li>
			<li>Fix Auth routes</li>
			<li>Write tests</li>
			<li>Properly document all functions</li>
			<li>Look into better way to do routing, this shit is fucking tedious...</li>
		</ul>
	</div>

	<div class="col-md-4">
		<h2>General</h2>
		<ul>
			<li>Localisation</li>
			<li>Document Project</li>
		</ul>
	</div>

</div>

@endsection
