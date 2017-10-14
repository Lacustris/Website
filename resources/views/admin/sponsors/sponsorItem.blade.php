<div class="row"><div class="col-md-2">
		<img src="/storage/{{ $sponsor->file }}" width="150px">
	</div>

	<div class="col-md-2">
		{{ $sponsor->url }}
	</div>

	<div class="col-md-2">
		{{ $sponsor->alt }}
	</div>

	<div class="col-md-2">
		<a href="/admin/sponsors/edit/{{ $sponsor->id }}" class="btn btn-default">
			<i class="fa fa-pencil"></i>
			{{ __( 'admin.edit' ) }}
		</a>
		<button class="btn btn-danger" data-action="delete" data-id="{{ $sponsor->id }}" data-confirmation="{{ __( 'admin.deleteConfirmation' ) }}">
			<i class="fa fa-trash"></i>
			{{ __( 'admin.delete' ) }}
		</button>
		<form id="delete_{{ $sponsor->id }}" action="/admin/sponsors/destroy/{{ $sponsor->id }}" method="POST" style="display: none;">
			{{ csrf_field() }}
		</form>
	</div>
</div>
