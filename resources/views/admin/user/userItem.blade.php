<div class="row">
	<div class="col-md-1">
		{{ $user->id }}
	</div>

	<div class="col-md-2">
		{{ $user->name }}
	</div>

	<div class="col-md-2">
		{{ $user->email }}
	</div>

	<div class="col-md-2">
		{{ $user->getRoleName() }}
	</div>

	<div class="col-md-2">
		<a href="/admin/user/edit/{{ $user->id }}" class="btn btn-default">
			<i class="fa fa-pencil"></i>
			{{ __( 'admin.edit' ) }}
		</a>
		<button class="btn btn-danger" data-action="delete" data-id="{{ $user->id }}" data-confirmation="{{ __( 'admin.deleteConfirmation' ) }}">
			<i class="fa fa-trash"></i>
			{{ __( 'admin.delete' ) }}
		</button>
		<form id="delete_{{ $user->id }}" action="/admin/user/destroy/{{ $user->id }}" method="POST" style="display: none;">
			{{ csrf_field() }}
		</form>
	</div>
</div>
