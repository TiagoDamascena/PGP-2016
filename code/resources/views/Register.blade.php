<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Register | My Study Life</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href={{url('/bootstrap/css/bootstrap.min.css')}}>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href={{url('/resources/css/AdminLTE.min.css')}}>
  <link rel="stylesheet" href={{url('/resources/css/skins/skin-blue.min.css')}}>
</head>

<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>My Study Life</b></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new user</p>

    <form action="{{url('/newUser')}}" method="get">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Full name" name="nome">
      </div>
      @if($newUserError =='user_already_exists')
        <span class="text-danger"> Email already registered </span>
      @endif
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email">
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
      </div>
      @if($newUserError =='password_differently')
        <span class="text-danger"> Passwords do not match </span>
      @endif
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Retype password" name="confirmPassword">
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div>
            <label>
              <a href={{url('/')}} class="text-center">I already have an account</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.0 -->
<script src="../../plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
