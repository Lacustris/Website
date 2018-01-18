<div class="row">

	<div class="col-md-1">{{ $competition->id }}</div>

	<div class="col-md-3">{{ $competition->event->name }}</div>

	<div class="col-md-3">{{ $competition->event->startDate(true) }}</div>

	<div class="col-md-3">{{ $competition->organisation }}<br>{{ $competition->location }}</div>
	<div class="col-md-2">
		<a href="/admin/competitions/edit/{{ $competition->id }}" class="btn btn-default">
			<i class="fa fa-pencil"></i>
			{{ __( 'admin.edit' ) }}
		</a>
		<button class="btn btn-danger" data-action="delete" data-id="{{ $competition->id }}">
			<i class="fa fa-trash"></i>
			{{ __( 'admin.delete' ) }}
		</button>
		<form id="delete_{{ $competition->id }}" action="/admin/competitions/destroy/{{ $competition->id }}" method="POST" style="display: none;">
			{{ csrf_field() }}
		</form>
	</div>

</div>
