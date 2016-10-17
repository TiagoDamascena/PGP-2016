<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | Study Each</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href={{url('/bootstrap/css/bootstrap.min.css')}}>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href={{url('/resources/AdminLTE/css/AdminLTE.min.css')}}>
    <link rel="stylesheet" href={{url('/resources/AdminLTE/css/skins/skin-blue.min.css')}}>
  </head>

  <body class="hold-transition login-page">

    <div class="login-box">
      <a href={{url('/')}}><img class="login-logo img-responsive" src={{url('/resources/img/name_2.png')}} alt="StudyEach"></a>

      <div class="login-box-body">
        @if($loginError=='errorForgotPassword')
          <p class="login-box-msg text-danger"> Your e-mail to recover the password doesn't be registered </p>
        @endif

        @if($loginError=='user_not_logged')
          <p class="login-box-msg text-danger"> Please Sign in first </p>
        @else
          <p class="login-box-msg">Sign in to start your session</p>
        @endif

        @if($loginError=='email_sent')
          <p class="login-box-msg text-danger"> Please check your email for recovery your Password </p>
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
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
          </div>
        </form>
        </br>
        <a data-target="#forgotModal" data-toggle="modal" >Forgot password?</a><br>
        <p>New on Study Each? <a href={{url('/register')}} class="text-center">Register here</a></p>
            <div class="text-center">
                <p>---------------------- Sign up with ---------------------- </p>
                <form action="{{url('/fbLogin')}}" method="get">
                    <input name="FBbutton" type="image" src={{url('/resources/img/facebook.png')}}>
                </form>
            </div>
      </div>


    </div>
    <!-- /.login-box-body -->

    <div class="modal fade" id="forgotModal" tabindex="-1" role="dialog" aria-labelledby="forgotModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title">
              Do you forgot your password?
            </h4>
          </div>
          <div class="modal-body text-center">
            <form action="{{url('/requestRecoveryPassword')}}" method="get">
              @if($loginError == 'errorForgotPassword')
                <span class="text-danger"> Email not registered </span>
              @endif
              <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Put your email here" name="email">
              </div>
              <div class="row">
                <!-- /.col -->
                <div class="col-xs-4 col-xs-offset-4">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Recover my Password</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- jQuery 2.2.0 -->
    <script src={{url('/plugins/jQuery/jQuery-2.2.0.min.js')}}></script>
    <!-- Bootstrap 3.3.6 -->
    <script src={{url('/bootstrap/js/bootstrap.min.js')}}></script>

  </body>
</html>
