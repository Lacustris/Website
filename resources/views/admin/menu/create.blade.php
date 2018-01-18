@extends ('layouts.admin')

@section('title')

{{ __( 'admin.menuAdmin' ) }}: {{ __( 'admin.new' ) }}

@stop

@section('contents')

<h1>{{ __( 'admin.menuAdmin' ) }} - {{ __( 'admin.new' ) }}</h1>

<form class="form-horizontal" role="form" method="POST" action="/admin/menu/store" data-needs="type">
{{ csrf_field() }}

<div class="row">
	<div class="col-md-5">

		<div class="form-group">
			<label for="name_nl" class="control-label">
				{{ __( 'admin.menuName' ) }} NL
			</label>
			
			<input id="name_nl" type="text" class="form-control" name="name_nl" value="{{ old('name_nl') }}" required>
		</div>

		<div class="form-group">
			<label for="name_en" class="control-label">
				{{ __( 'admin.menuName' ) }} EN
			</label>
			
			<input id="name_en" type="text" class="form-control" name="name_en" value="{{ old('name_en') }}" required>
		</div>

	</div>

	<div class="col-md-5 col-md-offset-1">

		<div class="form-group">
			<label for="parent" class="control-label">
				{{ __( 'admin.menuParent' ) }}
			</label>

			<select id="parent" name="parent" class="form-control" required>
				<option value="root" selected>---</option>

				@foreach($menu as $item)

				<option value="{{ $item->id }}">{{ $item->name() }}</option>

				@endforeach
			</select>
		</div>

		<div class="form-group">
			<label for="type" class="control-label">
				{{ __( 'admin.menuType' ) }}
			</label>

			<select id="type" name="type" class="form-control" data-action="select-menu-type" required>
				<option value="false" disabled selected>---</option>
				<option value="page">{{ __('admin.menuTypePage') }}</option>
				<option value="calendar">{{ __('admin.menuTypeCalendar') }}</option>
				<option value="competitions">{{ __('admin.menuTypeCompetitions') }}</option>
				<option value="link">{{ __('admin.menuTypeLink') }}</option>
			</select>
		</div>

		<div class="form-group" style="display: none;" data-menu-type="page">
			<label for="page" class="control-label">
				{{ __( 'admin.menuPage' ) }}
			</label>

			<select id="page" name="page" class="form-control" required>
				@foreach($pages as $page)

				<option value="{{ $page->slug }}">{{ $page->title() }}</option>

				@endforeach
			</select>
		</div>

		<div class="form-group" style="display: none;" data-menu-type="link">
			<label for="link" class="control-label">
				{{ __( 'admin.menuTypeLink' ) }}
			</label>

			<input name="link" id="link" class="form-control" value="{{ $item->getType() == 'link' ? $item->getTarget() : '' }}">
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
