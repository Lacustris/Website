@extends ('layouts.admin')

@section('title')

{{ __( 'admin.eventAdmin' ) }}: {{ __( 'admin.edit' ) }}

@stop

@section('contents')

<h1>{{ __( 'admin.eventAdmin' ) }} - {{ __( 'admin.edit' ) }}</h1>

@include('layouts.error')

<form class="form-horizontal" role="form" method="POST" action="/admin/events/update/{{ $event->id }}" data-editor="true">
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
			
			<input id="name" type="text" class="form-control" name="name" value="{{ old('name') !== null ? old('name') : $event->name }}" required>
		</div>

		<div class="form-group">
			<label for="name_en" class="control-label">
				{{ __( 'admin.eventTitle' ) }} EN
			</label>

			<input id="name_en" type="text" class="form-control" name="name_en" value="{{ old('name_en') !== null ? old('name_en') : $event->name_en }}" required>
		</div>

	</div>

	<div class="col-md-5 col-md-offset-1">

		<div class="form-group">
			<label for="start_time" class="control-label">
				{{ __( 'admin.eventStartTime' ) }}
			</label>
			
			<input id="start_time" type="datetime-local" class="form-control" name="start_time" value="{{ old('start_time') !== null ? old('start_time') : str_replace(' ', 'T', $event->start_time) }}" required>
		</div>

		<div class="form-group">
			<label for="end_time" class="control-label">
				{{ __( 'admin.eventEndTime' ) }}
			</label>
			
			<input id="end_time" type="datetime-local" class="form-control" name="end_time" value="{{ old('end_time') !== null ? old('end_time') : str_replace(' ', 'T', $event->end_time) }}" required>
		</div>

	</div>

	<div class="col-md-5">
		<div class="form-group">
			<label class="control-label">
			{{ __( 'admin.eventRegisterable' ) }}
			</label>
			<div class="checkbox">
				<label for="registerable" class="control-label">
					<input id="registerable" type="checkbox" name="registerable" value="1"{{ $event->registerable ? ' checked' : '' }}>
					{{ __( 'admin.eventRegisterable' ) }}
				</label>
			</div>
		</div>
	</div>

	<div class="col-md-12">
	
		<div class="form-group">
			<label for="description">
				{{ __( 'admin.eventDescription' ) }} NL
			</label>

			@include('layouts.editors.text', [ 'content' => old('description') !== null ? old('description') : $event->description, 'id' => 'description' ])
		</div>

	</div>

	<div class="col-md-12">
	
		<div class="form-group">
			<label for="description_en">
				{{ __( 'admin.eventDescription' ) }} EN
			</label>

			@include('layouts.editors.text', [ 'content' => old('description_en') !== null ? old('description_en') : $event->description_en, 'id' => 'description_en' ])
		</div>

	</div>

</div>

</form>

@include('layouts.dialogs.images')
@include('layouts.dialogs.url')

@endsection
