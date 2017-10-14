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
			{{ __( 'admin.slug' ) }}
		</div>

		<div class="col-md-2">
			{{ __( 'admin.title' ) }}
		</div>

		<div class="col-md-3">
			{{ __( 'admin.contents' ) }}
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
