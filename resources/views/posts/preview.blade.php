<div class="post post--preview">
	<div class="post__header">
		<h2 class="post__title">{{ $post->title }}</h2>
		<div class="post__age" data-toggle="tooltip" data-placement="top" title="{{ $post->publishDate() }}">
			{{ $post->age() }}
		</div>
	</div>
	<div class="post__content">{!! $post->content !!}</div>
	<a class="post__readmore" href="/post/{{ $post->slug }}">{{ __( 'posts.readMore' ) }}</a>
</div>
