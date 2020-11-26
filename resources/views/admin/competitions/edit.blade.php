@extends ('layouts.admin')

@section('title')

{{ __( 'admin.competitionAdmin' ) }}: {{ __( 'admin.edit' ) }}

@stop

@section('contents')

<h1>{{ __( 'admin.competitionAdmin' ) }} - {{ __( 'admin.edit' ) }}</h1>

@include('layouts.error')

<form class="form-horizontal" role="form" method="POST" action="/admin/competitions/update/{{ $competition->id }}" data-editor="true">
{{ csrf_field() }}

<div class="row">

	<div class="col-md-12">
		<button type="submit" class="btn btn-primary" data-editor="true">
			{{ __( 'admin.save' ) }}
		</button>
	</div>
	<div class="col-md-5">

		<div class="form-group">
			<label for="name" class="control-label">
				{{ __( 'admin.eventTitle' ) }} NL
			</label>
			
			<input id="name" type="text" class="form-control" name="name" value="{{ old('name') !== null ? old('name') : $competition->event->name }}" required>
		</div>

		<div class="form-group">
			<label for="name_en" class="control-label">
				{{ __( 'admin.eventTitle' ) }} EN
			</label>
			
			<input id="name_en" type="text" class="form-control" name="name_en" value="{{ old('name_en') !== null ? old('name_en') : $competition->event->name_en }}" required>
		</div>

		<div class="form-group">
			<label for="location" class="control-label">
				{{ __('admin.competitionLocation') }}
			</label>

			<input id="location" type="text" class="form-control" name="location" value="{{ old('location') !== null ? old('location') : $competition->location }}" required>
		</div>

	</div>

	<div class="col-md-5 col-md-offset-1">

		<div class="form-group">
			<label for="start_time" class="control-label">
				{{ __( 'admin.eventStartTime' ) }}
			</label>
			
			<input id="start_time" type="datetime-local" class="form-control" name="start_time" min="{{ $now }}" value="{{ old('start_time') !== null ? old('start_time') : str_replace(' ', 'T', $competition->event->start_time) }}" required>
		</div>

		<div class="form-group">
			<label for="end_time" class="control-label">
				{{ __( 'admin.eventEndTime' ) }}
			</label>
			
			<input id="end_time" type="datetime-local" class="form-control" name="end_time" value="{{ old('end_time') !== null ? old('end_time') : str_replace(' ', 'T', $competition->event->end_time) }}" required>
		</div>

		<div class="form-group">
			<label for="organisation" class="control-label">
				{{ __('admin.competitionOrganisation') }}
			</label>

			<input id="organisation" type="text" class="form-control" name="organisation" value="{{ old('organisation') !== null ? old('organisation') : $competition->organisation }}" required>
		</div>
	</div>

	<div class="col-md-5">
		<div class="form-group">
			<label for="link" class="control-label">
				{{ __('admin.competitionLink') }}
			</label>

			<input id="link" type="text" class="form-control" name="link" value="{{ old('link') !== null ? old('link') : $competition->link }}" required>
		</div>
	</div>

	<div class="col-md-12">
	
		<div class="form-group">
			<label for="description">
				{{ __( 'admin.eventDescription' ) }} NL
			</label>

			@include('layouts.editors.text', [ 'content' => old('description') !== null ? old('description') : $competition->event->description, 'id' => 'description' ])
		</div>

	</div>

	<div class="col-md-12">
	
		<div class="form-group">
			<label for="description_en">
				{{ __( 'admin.eventDescription' ) }} EN
			</label>

			@include('layouts.editors.text', [ 'content' => old('description_en') !== null ? old('description_en') : $competition->event->description_en, 'id' => 'description_en' ])
		</div>

	</div>

</div>

</form>

@include('layouts.dialogs.images')
@include('layouts.dialogs.url')

@endsection
