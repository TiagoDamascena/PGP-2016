<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TITLE | My Study Life</title>
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
        <li class="active"><a href={{url('/home')}}><i class="ion-home"></i> <span>Home</span></a></li>
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
        Page Header
        <small>Optional description</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->

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
</body>
</html>
