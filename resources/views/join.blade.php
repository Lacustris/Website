@extends('layouts.master')

@section('title')
{{ __('general.join') }}
@stop

@section('contents')

<h1>{{ __('general.join') }}</h1>
<form method="POST" class="form-horizontal">
	{{ csrf_field() }}

	<div class="form-group">
		<label for="name" class="control-label">
			{{ __( 'general.name' ) }}
		</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-user"></i></span>
			<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
		</div>
	</div>

	<div class="form-group">
		<label for="street" class="control-label">
			{{ __( 'general.street' ) }}
		</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-address-card"></i></span>
			<input id="street" type="text" class="form-control" name="street" value="{{ old('street') }}" required>
		</div>
	</div>

	<div class="form-group">
		<label for="zipcode" class="control-label">
			{{ __( 'general.zipcode' ) }}
		</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-address-card"></i></span>
			<input id="zipcode" type="text" class="form-control" name="zipcode" value="{{ old('zipcode') }}" required>
		</div>
	</div>

	<div class="form-group">
		<label for="city" class="control-label">
			{{ __( 'general.city' ) }}
		</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-address-card"></i></span>
			<input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" required>
		</div>
	</div>

	<div class="form-group">
		<label for="phonenumber" class="control-label">
			{{ __( 'general.phonenumber' ) }}
		</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-phone"></i></span>
			<input id="phonenumber" type="text" class="form-control" name="phonenumber" value="{{ old('phonenumber') }}" required>
		</div>
	</div>

	<div class="form-group">
		<label for="email" class="control-label">
			{{ __( 'general.email' ) }}
		</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
			<input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required>
		</div>
	</div>

	<div class="form-group">
		<label for="birthday" class="control-label">
			{{ __( 'general.birthday' ) }}
		</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
			<input id="birthday" type="text" class="form-control" name="birthday" value="{{ old('birthday') }}" required>
		</div>
	</div>

	<div class="form-group">
		<label for="studentnumber" class="control-label">
			{{ __( 'general.studentnumber' ) }}
		</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-id-badge"></i></span>
			<input id="studentnumber" type="text" class="form-control" name="studentnumber" value="{{ old('studentnumber') }}" required>
		</div>
	</div>

	<div class="form-group">
		<label for="sportscard" class="control-label">
			{{ __( 'general.sportscard' ) }}
		</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-id-badge"></i></span>
			<input id="sportscard" type="text" class="form-control" name="sportscard" value="{{ old('sportscard') }}" required>
		</div>
	</div>

	<div class="form-group">
		<label for="iban" class="control-label">
			{{ __( 'general.iban' ) }}
		</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-credit-card-alt"></i></span>
			<input id="iban" type="text" class="form-control" name="iban" value="{{ old('iban') }}" required>
		</div>
	</div>

	<div class="form-group">
		<label for="study" class="control-label">
			{{ __( 'general.study' ) }}
		</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-university"></i></span>
			<input id="study" type="text" class="form-control" name="study" value="{{ old('study') }}" required>
		</div>
	</div>

	<div class="form-group">
		<label for="studyend" class="control-label">
			{{ __( 'general.studyend' ) }}
		</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
			<input id="studyend" type="text" class="form-control" name="studyend" value="{{ old('studyend') }}" required>
		</div>
	</div>
	
	<div class="form-group">
		<label for="studiesat" class="control-label">{{ __( 'general.studiesat' ) }}</label>
		<select name="studiesat" class="form-control" id="studiesat" required>
			<option value="RU">Radboud Universiteit</option>
			<option value="HAN">Hogeschool Arnhem Nijmegen</option>
		</select>
	</div>

	<div class="form-group">
		<label for="mercurius" class="control-label">{{ __( 'general.mercurius' ) }}</label>
		<select name="mercurius" class="form-control" id="mercurius" required>
			<option value="yes">{{ __( 'general.yes') }}</option>
			<option value="no">{{ __( 'general.no') }}</option>
		</select>
    </div>

	<div class="form-group">
		<label for="activemember" class="control-label">{{ __( 'general.activemember' ) }}</label>
		<select name="activemember" class="form-control" id="activemember" required>
			<option value="yes">{{ __( 'general.yes') }}</option>
			<option value="no">{{ __( 'general.no') }}</option>
		</select>
    </div>

	<div class="form-group">
		<label for="marathon" class="control-label">{{ __( 'general.marathon' ) }}</label>
		<select name="marathon" class="form-control" id="marathon" required>
			<option value="yes">{{ __( 'general.yes') }}</option>
			<option value="no">{{ __( 'general.no') }}</option>
		</select>
    </div>

	<div class="form-group">
		<label for="licence" class="control-label">
			{{ __( 'general.licence' ) }}
		</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-id-badge"></i></span>
			<input id="licence" type="text" class="form-control" name="licence" value="{{ old('licence') }}" placeholder="{{ __( 'general.optional') }}">
		</div>
	</div>

	<div class="form-group">
		<label for="level" class="control-label">{{ __( 'general.level' ) }}</label>
		<select name="level" class="form-control" id="level" required>
			<option value="beginner">{{ __( 'general.beginner') }}</option>
			<option value="intermediate">{{ __( 'general.intermediate') }}</option>
			<option value="advanced">{{ __( 'general.advanced') }}</option>
		</select>
    </div>

	<div class="form-group">
		<label for="levelexplanation" class="control-label">{{ __( 'general.levelexplanation' ) }}</label>
		<textarea class="form-control" id="levelexplanation" name="levelexplanation" required>{{ old('levelexplanation') }}</textarea>
	</div>

	<button class="btn btn-primary">{{ __( 'general.send') }}</button>
</form>

@endsection
