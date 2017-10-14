@extends('layouts.master')

@section('title')
{{ __( 'auth.forgotPassword' ) }}
@stop

@section('contents')
<h1>{{ __( 'auth.forgotPassword' ) }}</h1>
@if (session('status'))
	<div class="alert alert-success">
		{{ session('status') }}
	</div>
@endif

<form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
	{{ csrf_field() }}

	<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
		<label for="email" class="col-md-4 control-label">{{ __( 'general.email' ) }}</label>

		<div class="col-md-6">
			<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

			@if ($errors->has('email'))
				<span class="help-block">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
			@endif
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			<button type="submit" class="btn btn-primary">
				{{ __( 'auth.sendResetLink' ) }}
			</button>
		</div>
	</div>
</form>
@endsection
