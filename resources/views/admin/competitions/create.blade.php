@extends ('layouts.admin')

@section('title')

{{ __( 'admin.competitionAdmin' ) }}: {{ __( 'admin.new' ) }}

@stop

@section('contents')

<h1>{{ __( 'admin.competitionAdmin' ) }} - {{ __( 'admin.new' ) }}</h1>

@include('layouts.error')

<form class="form-horizontal" role="form" method="POST" action="/admin/competitions/store" data-editor="true">
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
				{{ __( 'admin.eventTitle' ) }}
			</label>
			
			<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
		</div>

		<div class="form-group">
			<label for="location" class="control-label">
				{{ __('admin.competitionLocation') }}
			</label>

			<input id="location" type="text" class="form-control" name="location" value="{{ old('location') }}" required>
		</div>

	</div>

	<div class="col-md-5 col-md-offset-1">

		<div class="form-group">
			<label for="start_time" class="control-label">
				{{ __( 'admin.eventStartTime' ) }}
			</label>
			
			<input id="start_time" type="datetime-local" class="form-control" name="start_time" min="{{ $now }}" value="{{ old('start_time') }}" required>
		</div>

		<div class="form-group">
			<label for="end_time" class="control-label">
				{{ __( 'admin.eventEndTime' ) }}
			</label>
			
			<input id="end_time" type="datetime-local" class="form-control" name="end_time" value="{{ old('end_time') }}" required>
		</div>


	</div>

	<div class="col-md-5">
		<div class="form-group">
			<label for="organisation" class="control-label">
				{{ __('admin.competitionOrganisation') }}
			</label>

			<input id="organisation" type="text" class="form-control" name="organisation" value="{{ old('organisation') }}" required>
		</div>
	</div>

	<div class="col-md-5 col-md-offset-1">
		<div class="form-group">
			<label for="link" class="control-label">
				{{ __('admin.competitionLink') }}
			</label>

			<input id="link" type="text" class="form-control" name="link" value="{{ old('link') }}" required>
		</div>
	</div>

	<div class="col-md-12">
	
		<div class="form-group">
			<label for="description">
				{{ __( 'admin.eventDescription' ) }}
			</label>

			@include('layouts.editors.text', [ 'content' => old('description'), 'id' => 'description' ])
		</div>

	</div>

</div>

</form>

@include('layouts.dialogs.images')
@include('layouts.dialogs.url')

@endsection
