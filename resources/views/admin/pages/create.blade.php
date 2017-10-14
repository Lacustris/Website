@extends ('layouts.admin')

@section('title')

{{ __( 'admin.pageAdmin' ) }}: {{ __( 'admin.new' ) }}

@stop

@section('contents')

<h1>{{ __( 'admin.pageAdmin' ) }} - {{ __( 'admin.new' ) }}</h1>

@include('layouts.error')

<form class="form-horizontal" role="form" method="POST" action="/admin/pages/store" data-editor="true">

	<div class="col-md-12">
		<button type="submit" class="btn btn-primary" data-editor="true">
			{{ __( 'admin.save' ) }}
		</button>
	</div>
	
	{{ csrf_field() }}

	<div class="col-md-5">

		<div class="form-group">
			<label for="title_nl" class="control-label">
				{{ __( 'admin.title' ) }} NL
			</label>
			
			<input id="title_nl" type="text" class="form-control" name="title_nl" value="{{ old('title_nl') }}" required>
		</div>

		<div class="form-group">
			<label for="title_en" class="control-label">
				{{ __( 'admin.title' ) }} EN
			</label>
			
			<input id="title_en" type="text" class="form-control" name="title_en" value="{{ old('title_en') }}" required>
		</div>

	</div>

	<div class="col-md-5 col-md-offset-1">

		<div class="form-group">
			<label for="slug" class="control-label">
				{{ __( 'admin.slug' ) }}
			</label>
			
			<input id="slug" type="text" class="form-control" name="slug" value="{{ old('slug') }}" required>
		</div>

	</div>

	<div class="col-md-12">

		<div class="form-group">
			<label for="content_nl">
				{{ __( 'admin.contents' ) }} NL
			</label>

			@include('layouts.editors.text', [ 'content' => old('content_nl'), 'id' => 'content_nl' ])
		</div>

	</div>

	<div class="col-md-12">

		<div class="form-group">
			<label for="content_en">
				{{ __( 'admin.contents' ) }} EN
			</label>

			@include('layouts.editors.text', [ 'content' => old('content_en'), 'id' => 'content_en' ])
		</div>

	</div>

</form>

@include('layouts.dialogs.images')
@include('layouts.dialogs.url')

@endsection
