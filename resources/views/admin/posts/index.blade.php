@extends ('layouts.admin')

@section ('title')

{{ __( 'admin.postAdmin' ) }}

@stop

@section('contents')

<h1>{{ __( 'admin.postAdmin' ) }}</h1>

<a href="/admin/posts/create" class="btn btn-default">New</a>

<div class="admin-group headings">
	<div class="row">

		<div class="col-md-2">
			{{ __( 'admin.postSlug' ) }}
		</div>

		<div class="col-md-2">
			{{ __( 'admin.postTitle' ) }}
		</div>

		<div class="col-md-3">
			{{ __( 'admin.postContents' ) }}
		</div>

		<div class="col-md-1">
			{{ __( 'admin.language' ) }}
		</div>

		<div class="col-md-2">
			{{ __( 'admin.crud' ) }}
		</div>
	</div>
</div>


@foreach($posts as $post)

<div class="admin-group">

	@include('admin.posts.postItem', [ 'post' => $post ])

</div>

@endforeach

@endsection
