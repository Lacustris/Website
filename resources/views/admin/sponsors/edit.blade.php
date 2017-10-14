@extends ('layouts.admin')

@section('title')

{{ __( 'admin.sponsorAdmin' ) }}: {{ __( 'admin.edit' ) }}

@stop

@section('contents')

<h1>{{ __( 'admin.sponsorAdmin' ) }} - {{ __( 'admin.edit' ) }}</h1>

@include('layouts.error')

<form class="form-horizontal" role="form" method="POST" action="/admin/sponsors/update/{{ $sponsor->id }}" enctype="multipart/form-data">

	<div class="col-md-12">
		<button type="submit" class="btn btn-primary">
			{{ __( 'admin.save' ) }}
		</button>
	</div>
	
	{{ csrf_field() }}

	<div class="col-md-5">

		<div class="form-group">
			<label for="image" class="control-label">
				{{ __( 'admin.sponsorImage' ) }} ({{ __( 'admin.optional' ) }})
			</label>
			
			<input id="image" type="file" class="form-control" name="image" accept="image/*">
		</div>

		<div class="form-group">
			<label for="url" class="control-label">
				{{ __( 'admin.sponsorUrl' ) }}
			</label>
			
			<input id="url" type="text" class="form-control" name="url" value="{{ old('url') !== null ? old('url') : $sponsor->url }}" data-action="validate-url" required>
		</div>

		<div class="form-group">
			<label for="alt" class="control-label">
				{{ __( 'admin.sponsorName' ) }}
			</label>
			
			<input id="alt" type="text" class="form-control" name="alt" value="{{ old('alt') !== null ? old('alt') : $sponsor->alt }}" required>
		</div>

	</div>

	<div class="col-md-5 col-md-offset-1">

		<img src="/storage/{{ $sponsor->file }}" height="150" style="display: block;">

	</div>

</form>

@endsection
