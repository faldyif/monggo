<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- ========== Css Files ========== -->
  <link href="css/root.css" rel="stylesheet">
  <style type="text/css">
    body{background: #F5F5F5;}
  </style>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Scripts -->
  <script>
      window.Laravel = <?php echo json_encode([
          'csrfToken' => csrf_token(),
      ]); ?>
  </script>

  </head>
  <body>

    <div class="login-form">
      <form  role="form" method="POST" action="{{ url('/register') }}">
        {{ csrf_field() }}
        <div class="top">
          <h1>Register</h1>
          <h4>Join to our community now !</h4>
        </div>
        <div class="form-area">
          <div class="group">
            <input id="name" name="name" type="text" class="form-control" placeholder="Name" value="{{ old('name') }}">
            <i class="fa fa-user"></i>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
          </div>
          <div class="group">
            <input id="email" name="email" type="email" class="form-control" placeholder="E-mail" value="{{ old('email') }}">
            <i class="fa fa-envelope-o"></i>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
          <div class="group">
            <input id="password" name="password" type="password" class="form-control" placeholder="Password">
            <i class="fa fa-key"></i>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
          <div class="group">
            <input id="password-confirm" name="password_confirmation" type="password" class="form-control" placeholder="Password again">
            <i class="fa fa-key"></i>
            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
          </div>
          <button type="submit" class="btn btn-default btn-block">REGISTER NOW</button>
        </div>
      </form>
      <div class="footer-links row">
        <div class="col-xs-6"><a href="{{ url('login') }}"><i class="fa fa-sign-in"></i> Login</a></div>
        <div class="col-xs-6 text-right"><a href="{{ url('/password/reset') }}"><i class="fa fa-lock"></i> Forgot password</a></div>
      </div>
    </div>

</body>
</html>
