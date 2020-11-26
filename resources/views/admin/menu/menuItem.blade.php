<div class="row">

	<div class="col-md-1">
		@if(!isset($item->parent_id))
			{{ $item->order }}
			@if($item->order > \App\Menu::minOrder($item->parent_id) )
			<a href="/admin/menu/up/{{ $item->id }}"><i class="fa fa-chevron-up"></i></a>
			@endif
			@if($item->order < \App\Menu::maxOrder($item->parent_id))
			<a href="/admin/menu/down/{{ $item->id }}"><i class="fa fa-chevron-down"></i></a>
			@endif
		@endif
	</div>

	<div class="col-md-1">
		@if(isset($item->parent_id))
		{{ $item->order }}
			@if($item->order > \App\Menu::minOrder($item->parent_id) )
			<a href="/admin/menu/up/{{ $item->id }}"><i class="fa fa-chevron-up"></i></a>
			@endif
			@if($item->order < \App\Menu::maxOrder($item->parent_id))
			<a href="/admin/menu/down/{{ $item->id }}"><i class="fa fa-chevron-down"></i></a>
			@endif
		@endif
	</div>

	<div class="col-md-2">
		{{ $item->name_nl }}
	</div>

	<div class="col-md-2">
		{{ $item->name_en }}
	</div>

	<div class="col-md-1">
		{{ $item->visible ? __('admin.menuVisible') : __('admin.menuInvisible') }}
	</div>

	<div class="col-md-4">
		<a href="/admin/menu/edit/{{ $item->id }}" class="btn btn-default">
			<i class="fa fa-pencil"></i>
			{{ __( 'admin.edit' ) }}
		</a>
		<button class="btn btn-danger" data-action="delete" data-id="{{ $item->id }}" data-confirmation="{{ __('admin.menuDelete') }}">
			<i class="fa fa-trash"></i>
			{{ __( 'admin.delete' ) }}
		</button>
		<form id="delete_{{ $item->id }}" action="/admin/menu/destroy/{{ $item->id }}" method="POST" style="display: none;">
			{{ csrf_field() }}
		</form>
		<a href="/admin/menu/visibility/{{ $item->id }}" class="btn btn-default">
			<i class="fa fa-eye{{ $item->visible ? '-slash' : '' }}"></i>
			{{ $item->visible ? __( 'admin.unpublish' ) : __( 'admin.publish' ) }}
		</a>
	</div>

</div>

@if(count($item->getChildren(true)) > 0)

@foreach($item->getChildren(true) as $child)

	@include('admin.menu.menuItem', [ 'item' => $child ])

@endforeach

@endif
