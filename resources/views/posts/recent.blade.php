@extends ('layouts.master')

@section('title')
	{{ __('posts.recentTitle') }}
@stop

@section('contents')

<h1>{{ __('posts.recentTitle') }}</h1>

@foreach($posts as $post)

@include('posts.preview', [ 'post' => $post ] )

@endforeach

{{ $posts->links() }}

@endsection
