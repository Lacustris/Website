<div class="row">

	<div class="col-md-1">
		{{ $item->parent_id }}
	</div>

	<div class="col-md-1">
		{{ $item->id }}
	</div>

	<div class="col-md-2">
		{{ $item->name_nl }}
	</div>

	<div class="col-md-2">
		{{ $item->name_en }}
	</div>

	<div class="col-md-1">
		{{ $item->order }}
	</div>

	<div class="col-md-2">
		<a href="/admin/menu/edit/{{ $item->id }}" class="btn btn-default">
			<i class="fa fa-pencil"></i>
			{{ __( 'admin.edit' ) }}
		</a>
		<button class="btn btn-danger" data-action="delete" data-id="{{ $item->id }}">
			<i class="fa fa-trash"></i>
			{{ __( 'admin.delete' ) }}
		</button>
		<form id="delete_{{ $item->id }}" action="/admin/menu/destroy/{{ $item->id }}" method="POST" style="display: none;">
			{{ csrf_field() }}
		</form>
	</div>

</div>

@if(count($item->getChildren()) > 0)

@foreach($item->getChildren() as $child)

	@include('admin.menu.menuItem', [ 'item' => $child ])

@endforeach

@endif
