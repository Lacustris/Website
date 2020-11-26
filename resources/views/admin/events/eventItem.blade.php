<div class="row">
	<div class="col-md-1">
			{{ $item->id }}
		</div>

		<div class="col-md-3">
			{{ $item->name }}
		</div>

		<div class="col-md-3">
			{{ $item->startDate() }}<br>
			{{ $item->startTime() }}
		</div>

		<div class="col-md-2">
			{!! $item->registerable ? __( 'general.yes' ) . '<br>' . count($item->participants) . ' ' . __( 'events.participants' ) : __( 'general.no' ) !!}
		</div>

		<div class="col-md-2">
		<a href="/admin/events/edit/{{ $item->id }}" class="btn btn-default">
			<i class="fa fa-pencil"></i>
			{{ __( 'admin.edit' ) }}
		</a>
		<button class="btn btn-danger" data-action="delete" data-id="{{ $item->id }}">
			<i class="fa fa-trash"></i>
			{{ __( 'admin.delete' ) }}
		</button>
		<form id="delete_{{ $item->id }}" action="/admin/events/destroy/{{ $item->id }}" method="POST" style="display: none;">
			{{ csrf_field() }}
		</form>
	</div>
</div>
