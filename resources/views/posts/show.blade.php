@extends ('layouts.master')

@section('title')
	{{ $post->title }}
@stop

@section('contents')

<div class="post">
	<h1 class="post__title">{{ $post->title }}</h1>

	<div class="post__content">{!! $post->content !!}</div>
</div>

@endsection
