@extends ('layouts.admin')

@section('title')

{{ __( 'admin.menuAdmin' ) }}: {{ __( 'admin.edit' ) }}

@stop

@section('contents')

<h1>{{ __( 'admin.menuAdmin' ) }} - {{ __( 'admin.edit' ) }}</h1>

<form class="form-horizontal" role="form" method="POST" action="/admin/menu/update/{{ $item->id }}">
{{ csrf_field() }}

<div class="row">
	<div class="col-md-5">

		<div class="form-group">
			<label for="name_nl" class="control-label">
				{{ __( 'admin.menuName' ) }} NL
			</label>
			
			<input id="name_nl" type="text" class="form-control" name="name_nl" value="{{ $item->name_nl }}" required>
		</div>

		<div class="form-group">
			<label for="name_en" class="control-label">
				{{ __( 'admin.menuName' ) }} EN
			</label>
			
			<input id="name_en" type="text" class="form-control" name="name_en" value="{{ $item->name_en }}" required>
		</div>

	</div>

	<div class="col-md-5 col-md-offset-1">

		<div class="form-group">
			<label for="parent" class="control-label">
				{{ __( 'admin.menuName' ) }}
			</label>

			<select id="parent" name="parent" class="form-control" required>
				<option value="root" {{ isset($item->parent_id) ? '' : 'selected' }}>---</option>

				@foreach($menu as $menuItem)

				<option value="{{ $menuItem->id }}" {{ $menuItem->id == $item->parent_id ? 'selected' : '' }}>{{ $menuItem->name() }}</option>

				@endforeach
			</select>
		</div>

		<div class="form-group">
			<label for="type" class="control-label">
				{{ __( 'admin.menuType' ) }}
			</label>

			<select id="type" name="type" class="form-control" data-action="select-menu-type" required>
				<option value="page"{{ $item->getType() == 'dynamic' ? ' selected' : '' }}>{{ __('admin.menuTypePage') }}</option>
				<option value="calendar"{{ $item->getType() == 'calendar' ? ' selected' : '' }}>{{ __('admin.menuTypeCalendar') }}</option>
			</select>
		</div>

		<div class="form-group"{{ $item->getType() == 'dynamic' ? ' style="display: none;"' : '' }} data-menu-type="page">
			<label for="page" class="control-label">
				{{ __( 'admin.menuPage' ) }}
			</label>

			<select id="page" name="page" class="form-control" required>
				@foreach($pages as $page)

				<option value="{{ $page->slug }}"{{ ('dynamic:' . $page->slug == $item->target) ? ' selected' : '' }}>{{ $page->title() }}</option>

				@endforeach
			</select>
		</div>

	</div>

	<div class="col-md-5 col-md-offset-6">
		<button type="submit" class="btn btn-primary">
			{{ __( 'admin.save' ) }}
		</button>
	</div>

</div>

</form>

@endsection
