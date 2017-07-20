<h3>{{ __('auth.login') }}</h3>
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            @if ($errors)
              <div class="form-group has-error">
                <span class="help-block">
                    <strong>{{ $errors->first() }}</strong>
                </span>
              </div>
            @endif

            <div class="form-group">
              <label for="email" class="col-md-4 control-label">{{ __('general.email') }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
              </div>
            </div>

            <div class="form-group">
              <label for="password" class="col-md-4 control-label">{{ __('general.password') }}</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" required>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('auth.remember' ) }}
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('auth.login') }}
                    </button>

                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('auth.forgotPassword') }}
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
