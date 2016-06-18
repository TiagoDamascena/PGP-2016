<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Forgot your Password? | Study Each</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href={{url('/bootstrap/css/bootstrap.min.css')}}>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href={{url('/resources/css/AdminLTE.min.css')}}>
    <link rel="stylesheet" href={{url('/resources/css/skins/skin-blue.min.css')}}>
</head>

<body class="hold-transition register-page">
<div class="register-box">
    <a href={{url('/')}}><img class="login-logo img-responsive" src={{url('/resources/img/name_2.png')}} alt="StudyEach"></a>

    <div class="register-box-body">
        <p class="login-box-msg">Recover your Password</p>

        <form action="{{url('/passwordChanged/'.$unique_key)}}" method="get">
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="New Password" name="password">
            </div>
            @if($errorRecoveryPassword =='password_do_not_match')
                <p class="login-box-msg text-danger"> Passwords don't match </p>
            @endif
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Retype your new password" name="confirmPassword">
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Recover my Password</button>
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
