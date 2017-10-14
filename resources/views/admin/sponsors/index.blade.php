@extends ('layouts.admin')

@section ('title')

{{ __( 'admin.sponsorAdmin' ) }}

@stop

@section('contents')

<h1>{{ __( 'admin.sponsorAdmin' ) }}</h1>

<a href="/admin/sponsors/create" class="btn btn-default">{{ __( 'admin.new' ) }}</a>

<div class="admin-group headings">
	<div class="row">
		<div class="col-md-2">
			{{ __( 'admin.sponsorImage' ) }}
		</div>

		<div class="col-md-2">
			{{ __( 'admin.sponsorUrl' ) }}
		</div>

		<div class="col-md-2">
			{{ __( 'admin.sponsorName' ) }}
		</div>

		<div class="col-md-2">
			{{ __( 'admin.crud' ) }}
		</div>
	</div>
</div>

@foreach($sponsors as $sponsor)

<div class="admin-group">

	@include('admin.sponsors.sponsorItem', [ 'sponsor' => $sponsor ] )

</div>

@endforeach

@endsection
