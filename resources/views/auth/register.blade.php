@extends('layouts.user')

@section('content')

<div>
  <div class="container main-container">
    <div class="row">
      <div class="col-md-4 text-left">
        <h1 class="margin-tb-24">Registrieren</h1>
        <em>Jetzt kostenlos registrieren</em>
        <form class="form-horizontal margin-tb-24" role="form" method="POST" action="{{ url('/register') }}">
          {{ csrf_field() }}

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-12 text-left">E-Mail</label>

            <div class="col-md-12">
              <input id="email" type="email" class="form-control" name="email" required>

              @if ($errors->has('email'))
              <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
              @endif
            </div>
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <div class="col-md-6">
              <label for="password" class="text-left">Passwort</label>
            </div>
            <div class="col-md-6 text-right">
              <input id="passwordShow" type="checkbox" /> <div id="passwordShowLabel" style="display: inline-block;">Anzeigen</div>
            </div>
            <div class="col-md-12">
              <input id="password" type="password" class="form-control" name="password" required>
            </div>
            <div class="col-md-12">
              @if ($errors->has('password'))
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
              @endif
            </div>
          </div>


          <div class="form-group">
            <div class="col-md-12">

            </div>

            <div class="col-md-12">
              <div class="marginB-16">
                <button type="submit" class="btn btn-primary btn-full">
                  weiter
                </button>
              </div>
              <br>
              <a href="{{ url('login') }}">
                Zum login
              </a>
            </div>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>
</div>
<script>
(function ($) {
  $.toggleShowPassword = function (options) {
    var settings = $.extend({
      field: "#password",
      control: "#toggle_show_password",
    }, options);

    var control = $(settings.control);
    var field = $(settings.field)

    control.bind('click', function () {
      if (control.is(':checked')) {
        field.attr('type', 'text');
        $('#passwordShowLabel').text('Verstecken');
      } else {
        field.attr('type', 'password');
        $('#passwordShowLabel').text('Anzeigen');
      }
    })
  };
}(jQuery));


$.toggleShowPassword({
  field: '#password',
  control: '#passwordShow'
});
</script>
@endsection
