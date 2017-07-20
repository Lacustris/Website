@extends ('layouts.admin')

@section ('title')

{{ __( 'admin.userAdmin' ) }}: {{ __( 'admin.new' ) }}

@stop

@section('contents')

<h1>{{ __( 'admin.userAdmin' ) }} - {{ __( 'admin.new' ) }}</h1>

@include('layouts.error')

<form class="form-horizontal" role="form" method="POST" action="/admin/user/store">

	<div class="col-md-12">
		<button type="submit" class="btn btn-primary">
			{{ __( 'admin.save' ) }}
		</button>
	</div>
	
	{{ csrf_field() }}

	<div class="col-md-5">
		<div class="form-group">
			<label for="name" class="control-label">
				{{ __( 'general.name' ) }}
			</label>
			
			<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
		</div>

		<div class="form-group">
			<label for="email" class="control-label">
				{{ __( 'general.email' ) }}
			</label>
			
			<input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required>
		</div>
	</div>
	
	<div class="col-md-5 col-md-offset-1">
		<div class="form-group">
			<label for="role" class="control-label">
				{{ __( 'admin.userRole' ) }}
			</label>

			<select id="role" name="role" class="form-control" required>
				@foreach(App\Role::roles as $id => $values)

				<option value="{{ $id }}"{{ old('role') == $id ? ' selected' : ''}}>{{ $values['name'] }}</option>

				@endforeach
			</select>
		</div>
	</div>

</form>

@endsection
