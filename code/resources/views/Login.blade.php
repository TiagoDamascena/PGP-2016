<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | My Study Life</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href={{url('/bootstrap/css/bootstrap.min.css')}}>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href={{url('/resources/css/AdminLTE.min.css')}}>
  <link rel="stylesheet" href={{url('/resources/css/skins/skin-blue.min.css')}}>
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href={{url('/')}}><b>My Study Life</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    @if($loginError=='user_not_logged')
      <p class="login-box-msg text-danger"> Please Sign in first </p>
    @else
      <p class="login-box-msg">Sign in to start your session</p>
    @endif
    
    <form action="{{url('/loginUser')}}" method="get">
      @if($loginError=='email_not_found')
        <span class="text-danger"> Incorrect Email </span>
      @endif
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email">
      </div>
      @if($loginError=='wrong_password')
        <span class="text-danger"> Incorrect Password </span>
      @endif
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div>
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    
    </br>
    <a href="#">Forgot password?</a><br>
    <p>New on My Study Life? <a href={{url('/registerUser')}} class="text-center">Register here</a></p>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.0 -->
<script src={{url('/plugins/jQuery/jQuery-2.2.0.min.js')}}></script>
<!-- Bootstrap 3.3.6 -->
<script src={{url('/bootstrap/js/bootstrap.min.js')}}></script>

</body>
</html>
