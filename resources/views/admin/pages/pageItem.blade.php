<div class="row">
	<div class="col-md-2">
		{{ $page->slug }}
	</div>

	<div class="col-md-2">
		{{ $page->title_nl }}<br>
		{{ $page->title_en }}
	</div>

	<div class="col-md-3">
		{!! $page->preview('contents_nl') !!}...
	</div>

	<div class="col-md-3">
		{!! $page->preview('contents_en') !!}...
	</div>

	<div class="col-md-2">
		<a href="/admin/pages/edit/{{ $page->slug }}" class="btn btn-default">
			<i class="fa fa-pencil"></i>
			{{ __( 'admin.edit' ) }}
		</a>
		<button class="btn btn-danger" data-action="delete" data-id="{{ $page->id }}" data-confirmation="{{ __( 'admin.deleteConfirmation' ) }}">
			<i class="fa fa-trash"></i>
			{{ __( 'admin.delete' ) }}
		</button>
		<form id="delete_{{ $page->id }}" action="/admin/pages/destroy/{{ $page->slug }}" method="POST" style="display: none;">
			{{ csrf_field() }}
		</form>
	</div>
</div>
