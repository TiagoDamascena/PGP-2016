<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Settings | My Study Life</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href={{url('/bootstrap/css/bootstrap.min.css')}}>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href={{url('/resources/css/AdminLTE.min.css')}}>
  <link rel="stylesheet" href={{url('/resources/css/skins/skin-blue.min.css')}}>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href={{url('/home')}} class="logo">
      <span class="logo-mini"><b>My</b></span>
      <span class="logo-lg"><b>My Study Life</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href={{url('/settings')}} title="Settings"><i class="ion-gear-a"></i></a>
          </li>
          <!-- Logout Sidebar Toggle Button -->
          <li>
            <a href={{url('/logout')}} title="Logout"><i class="ion-log-out"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src={{url('/resources/img/user.jpg')}} class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <?php $user = \Auth::user();?>
          <p><?php echo $user->name?></p>
          <p><?php echo $user->email?></p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        
        <!-- Optionally, you can add icons to the links -->
        <li><a href={{url('/home')}}><i class="ion-home"></i> <span>Home</span></a></li>
        <li><a href={{url('/calendar')}}><i class="ion-calendar"></i> <span>Calendar</span></a></li>
        <li><a href={{url('/tasks')}}><i class="ion-compose"></i> <span>Tasks</span></a></li>
        <li><a href={{url('/exams')}}><i class="ion-document-text"></i> <span>Exams</span></a></li>
        <li><a href={{url('/schedule')}}><i class="ion-university"></i> <span>Schedule</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Settings
        <small>Edit your account settings</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <section class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="ion-edit"></i> Change Name</h3>
        </div>
        <div class="box-body">
          <form action="{{url('/changeName')}}" method="get">
            <div class="row">
              <div class="form-group has-feedback col-sm-6">
                <input type="text" class="form-control" placeholder="New name" name="name">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <button type="submit" class="btn btn-warning btn-block btn-sm">Change Name</button>
              </div>
            </div>
          </form>
        </div>
      </section>
      
      <section class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="ion-email"></i> Change Email</h3>
        </div>
        <div class="box-body">
          <form action="{{url('/changeEmail')}}" method="get">
            @if($settingsFeedback=='email_do_not_match')
              <span class="text-danger"> Emails do not match </span>
            @endif
            <div class="row">
              <div class="form-group has-feedback col-sm-6">
                <input type="email" class="form-control" placeholder="New email" name="email">
              </div>
            </div>
            <div class="row">
              <div class="form-group has-feedback col-sm-6">
                <input type="email" class="form-control" placeholder="Retype new email" name="confirmEmail">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <button type="submit" class="btn btn-danger btn-block btn-sm">Change Email</button>
              </div>
            </div>
          </form>
        </div>
      </section>
      
      <section class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="ion-locked"></i> Change Password</h3>
        </div>
        <div class="box-body">
          <form action="{{url('/changePassword')}}" method="get">
            @if($settingsFeedback=='password_do_not_match')
              <span class="text-danger"> Passwords do not match </span>
            @endif
            <div class="row">
              <div class="form-group has-feedback col-sm-6">
                <input type="password" class="form-control" placeholder="New password" name="password">
              </div>
            </div>
            <div class="row">
              <div class="form-group has-feedback col-sm-6">
                <input type="password" class="form-control" placeholder="Retype new password" name="confirmPassword">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <button type="submit" class="btn btn-danger btn-block btn-sm">Change Password</button>
              </div>
            </div>
          </form>
        </div>
      </section>
      
      <section class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="ion-locked"></i> Delete Account</h3>
        </div>
        <div class="box-body">
          <form action="{{url('/deleteUser')}}" method="get">
            <div class="row">
              <div class="col-sm-3">
                <button type="submit" class="btn btn-danger btn-block btn-sm" onClick="confirmDelete()">Delete Account</button>
              </div>
            </div>
          </form>
        </div>
      </section>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      <i class="ion-star"></i>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="https://github.com/nikolassupremo/PGP-2016">My Study Life</a>.</strong> Gerência de Projeto de Software.
  </footer>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.0 -->
<script src={{url('/plugins/jQuery/jQuery-2.2.0.min.js')}}></script>
<!-- Bootstrap 3.3.6 -->
<script src={{url('/bootstrap/js/bootstrap.min.js')}}></script>
<!-- AdminLTE App -->
<script src={{url('/resources/js/app.min.js')}}></script>

@if($settingsFeedback=='name_changed')
  <script type="text/javascript">alert("Name Successfull changed!");</script>
@endif
@if($settingsFeedback=='email_changed')
  <script type="text/javascript">alert("Email Successfull changed!");</script>
@endif
@if($settingsFeedback=='password_changed')
  <script type="text/javascript">alert("Password Successfull changed!");</script>
@endif

<script>
  function confirmDelete() {
    confirm("Delete your account?");
  }
</script>

</body>
</html>
