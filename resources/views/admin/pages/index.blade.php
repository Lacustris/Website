@extends ('layouts.admin')

@section ('title')

{{ __( 'admin.pageAdmin' ) }}

@stop

@section('contents')

<h1>{{ __( 'admin.pageAdmin' ) }}</h1>

<a href="/admin/pages/create" class="btn btn-default">{{ __( 'admin.new' ) }}</a>

<div class="admin-group headings">
	<div class="row">

		<div class="col-md-2">
			{{ __( 'admin.slug' ) }}
		</div>

		<div class="col-md-2">
			{{ __( 'admin.title' ) }}
		</div>

		<div class="col-md-3">
			{{ __( 'admin.contents' ) }} NL
		</div>

		<div class="col-md-3">
			{{ __( 'admin.contents' ) }} EN
		</div>

		<div class="col-md-2">
			{{ __( 'admin.crud' ) }}
		</div>
	</div>
</div>


@foreach($pages as $page)

<div class="admin-group">

	@include('admin.pages.pageItem', [ 'page' => $page ])

</div>

@endforeach
<div class="row">
	<div class="col-md-12">{{ $pages->links() }}</div>
</div>

@endsection
