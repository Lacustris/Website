<div class="row">
	<div class="col-md-2">
		{{ $post->slug }}
	</div>

	<div class="col-md-2">
		{{ $post->title }}
	</div>

	<div class="col-md-3">
		{!! $post->content !!}...
	</div>

	<div class="col-md-1">
		{{ __('admin.lang' . strtoupper( $post->language ) ) }} 
	</div>

	<div class="col-md-2">
		<a href="/admin/posts/edit/{{ $post->slug }}" class="btn btn-default">
			<i class="fa fa-pencil"></i>
			{{ __( 'admin.edit' ) }}
		</a>
		<button class="btn btn-danger" data-action="delete" data-id="{{ $post->id }}" data-confirmation="{{ __( 'admin.deleteConfirmation' ) }}">
			<i class="fa fa-trash"></i>
			{{ __( 'admin.delete' ) }}
		</button>
		<form id="delete_{{ $post->id }}" action="/admin/posts/destroy/{{ $post->slug }}" method="POST" style="display: none;">
			{{ csrf_field() }}
		</form>
	</div>
</div>
