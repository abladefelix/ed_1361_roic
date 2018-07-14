@extends('layouts.auth')

@section('content')
<div class="login-background">
  <div class="container main-container">
    <div class="col-md-9">
      <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}
        <div>
          @if(isset($_GET['out']))<a href="/login" class="alert alert-green">Your where successfully logged out.</a>@endif
        </div>
        <div class="margin-tb-64">
          <h1>ROIC Login</h1>
          <div><p>Login into your ROIC Account</p></div>
        </div>

        <div class="row">
          <div class="col-md-6">
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div>
              <label for="email" class="control-label">E-Mail</label>
            </div>

            <div>
              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

              @if ($errors->has('email'))
              <span class="help-block">
                <strong>Password or Email incorrect.</strong>
              </span>
              @endif
            </div>
          </div>
          </div>

          <div class="col-md-6">
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="control-label">Password</label>

              <div>
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                <span class="help-block">
                  <strong>Bitte Daten überprüfen.</strong>
                </span>
                @endif
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="checkbox">
              <label>
                <input type="checkbox" name="remember"> Eingeloggt bleiben
              </label>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-gold btn-login">
                    Login
                  </button>

                  <a class="btn btn-link" href="{{ url('/password/reset') }}">
                    Forgot Passwor?
                  </a>
                  <br>
                  <br>
                  <a href="{{ url('/register') }}" class="btn btn-black btn-full">Sign up</a>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
