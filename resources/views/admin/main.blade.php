@extends ('layouts.admin')

@section ('title')

{{ __( 'admin.adminTitleShort' ) }}

@stop

@section('contents')

<div>
	<h1>{{ __( 'admin.adminTitle' ) }}</h1>

	<p>
		{{ __( 'admin.adminText' ) }}
</div>

@endsection
