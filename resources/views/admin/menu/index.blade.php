@extends ('layouts.admin')

@section('title')

{{ __( 'admin.menuAdmin' ) }}

@stop

@section('contents')

<h1>{{ __( 'admin.menuAdmin' ) }}</h1>

<a href="/admin/menu/create" class="btn btn-default">{{ __( 'admin.new' ) }}</a>

<div class="admin-group headings">
	<div class="row">
		<div class="col-md-1">
			{{ __( 'admin.menuParent' ) }}
		</div>

		<div class="col-md-1">
			ID
		</div>

		<div class="col-md-2">
			{{ __( 'admin.menuName' ) }} NL
		</div>

		<div class="col-md-2">
			{{ __( 'admin.menuName' ) }} EN
		</div>

		<div class="col-md-1">
			{{ __( 'admin.menuOrder' ) }}
		</div>

		<div class="col-md-2">
			{{ __( 'admin.crud' ) }}
		</div>
	</div>
</div>

@foreach($menu as $item)

<div class="admin-group">

	@include('admin.menu.menuItem', [ 'item' => $item ])

</div>

@endforeach

@endsection
