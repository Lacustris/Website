@extends ('layouts.admin')

@section('title')

{{ __( 'admin.postAdmin' ) }}: {{ __( 'admin.edit' ) }}

@stop

@section('contents')

<h1>{{ __( 'admin.postAdmin' ) }} - {{ __( 'admin.edit' ) }}</h1>

@include('layouts.error')

<form class="form-horizontal" role="form" method="POST" action="/admin/posts/update" data-editor="true">

	<div class="col-md-12">
		<button type="submit" class="btn btn-primary" data-editor="true">
			{{ __( 'admin.save' ) }}
		</button>
	</div>
	
	{{ csrf_field() }}

	<div class="col-md-5">

		<div class="form-group">
			<label for="title" class="control-label">
				{{ __( 'admin.postTitle' ) }}
			</label>
			
			<input id="title" type="text" class="form-control" name="title" value="{{ $post->title }}" required>
		</div>

	</div>

	<div class="col-md-5 col-md-offset-1">

		<div class="form-group">
			<label for="slug" class="control-label">
				{{ __( 'admin.postSlug' ) }}
			</label>
			
			<input id="slug" type="text" class="form-control" name="slug" value="{{ $post->slug }}" required>
		</div>

		<div class="form-group">
			<label for="language" class="control-label">
				{{ __( 'admin.postLanguage' ) }}
			</label>
			
			<select id="language" name="language" class="form-control" required>
				<option value="nl"{{ $post->language == 'nl' ? ' selected' : '' }}>{{ __( 'admin.langNL' ) }}</option>
				<option value="en"{{ $post->language == 'en' ? ' selected' : '' }}>{{ __( 'admin.langEN' ) }}</option>
			</select>
		</div>

	</div>

	<div class="col-md-12">

		<div class="form-group">
			<label for="content_nl">
				{{ __( 'admin.postContents' ) }}
			</label>

			@include('layouts.editors.text', [ 'content' => $post->content, 'id' => 'content' ])
		</div>

	</div>

</form>

@include('layouts.dialogs.images')
@include('layouts.dialogs.url')

@endsection
