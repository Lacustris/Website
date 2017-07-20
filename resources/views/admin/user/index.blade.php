@extends ('layouts.admin')

@section ('title')

{{ __( 'admin.userAdmin' ) }}

@stop

@section('contents')

<h1>{{ __( 'admin.userAdmin' ) }}</h1>

<a href="/admin/user/create" class="btn btn-default">{{ __( 'admin.new' ) }}</a>

<div class="admin-group headings">
	<div class="row">
		<div class="col-md-1">
			ID
		</div>

		<div class="col-md-2">
			{{ __( 'general.name' ) }}
		</div>

		<div class="col-md-2">
			{{ __( 'general.email' ) }}
		</div>

		<div class="col-md-2">
			{{ __( 'admin.userRole' ) }}
		</div>

		<div class="col-md-2">
			{{ __( 'admin.crud' ) }}
		</div>
	</div>
</div>

@foreach($users as $user)

<div class="admin-group">

	@include('admin.user.userItem', [ 'user' => $user ] )

</div>

@endforeach

@endsection
