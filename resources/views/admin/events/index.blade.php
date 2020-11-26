@extends ('layouts.admin')

@section('title')

{{ __( 'admin.eventAdmin' ) }}

@stop

@section('contents')

<h1>{{ __( 'admin.eventAdmin' ) }}</h1>

<a href="/admin/events/create" class="btn btn-default">{{ __( 'admin.new' ) }}</a>

<div class="admin-group headings">
	<div class="row">
		<div class="col-md-1">
			ID
		</div>

		<div class="col-md-3">
			{{ __( 'admin.eventTitle' ) }}
		</div>

		<div class="col-md-3">
			{{ __( 'admin.eventDateTime' ) }}
		</div>
		
		<div class="col-md-2">
			{{ __( 'admin.eventRegisterable' ) }}
		</div>

		<div class="col-md-2">
			{{ __( 'admin.crud' ) }}
		</div>
	</div>
</div>

@foreach($events as $item)

<div class="admin-group">

	@include('admin.events.eventItem', [ 'item' => $item ])

</div>

@endforeach

@endsection
