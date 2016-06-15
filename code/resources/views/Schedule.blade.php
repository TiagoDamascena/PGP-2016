<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Schedule | My Study Life</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href={{url('/bootstrap/css/bootstrap.min.css')}}>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href={{url('/plugins/datepicker/datepicker3.css')}}>
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
        <li class="active"><a href={{url('/schedule')}}><i class="ion-university"></i> <span>Schedule</span></a></li>
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
      <div class="col-sm-4 col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">School Years</h3>
          </div>
          <div class="box-body" id="years">
          </div>
          <div class="box-footer">
            <button type="button" class="btn btn-primary btn-block btn-sm" data-toggle="modal" data-target="#newYearModal">New School Year</button>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">School Terms</h3>
          </div>
          <div class="box-body" id="terms">
          </div>
          <div class="box-footer">
            <button type="button" class="btn btn-primary btn-block btn-sm" data-toggle="modal" data-target="#newTermModal">New School Term</button>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Subjects</h3>
          </div>
          <div class="box-body" id="subjects">
          </div>
          <div class="box-footer">
            <button type="button" class="btn btn-primary btn-block btn-sm" data-toggle="modal" data-target="#newSubjectModal">New Subject</button>
          </div>
        </div>
      </div>
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

<!-- Modal New Year -->
<div class="modal fade" id="newYearModal" tabindex="-1" role="dialog" aria-labelledby="newYearModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Create new School Year</h4>
      </div>
      <form action="{{url('/newSchoolYear')}}" method="get">
        <div class="modal-body">
          <div class="row">
            <div class="form-group has-feedback col-sm-12">
              <input type="text" class="form-control" placeholder="Year name" name="name">
            </div>
          </div>
          <div class="row">
            <div class="form-group has-feedback col-sm-6">
              <div class="input-group date">
                <div class="input-group-addon">
                    <i class="ion-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="yearStartDate" placeholder="Start date" name="startDate">
              </div>
            </div>
            <div class="form-group has-feedback col-sm-6">
              <div class="input-group date">
                <div class="input-group-addon">
                    <i class="ion-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="yearEndDate" placeholder="End date" name="endDate">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save year</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal New Term -->
<div class="modal fade" id="newTermModal" tabindex="-1" role="dialog" aria-labelledby="newTermModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Create new School Term</h4>
      </div>
      <form action="{{url('/newSchoolTerm')}}" method="get">
        <div class="modal-body">
          <div class="row">
            <div class="form-group has-feedback col-sm-12">
              <input type="text" class="form-control" placeholder="Term name" name="name">
            </div>
          </div>
          <div class="row">
            <div class="form-group has-feedback col-sm-6">
              <div class="input-group date">
                <div class="input-group-addon">
                    <i class="ion-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="termStartDate" placeholder="Start date" name="startDate">
              </div>
            </div>
            <div class="form-group has-feedback col-sm-6">
              <div class="input-group date">
                <div class="input-group-addon">
                    <i class="ion-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="termEndDate" placeholder="End date" name="endDate">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save term</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal New Subject -->
<div class="modal fade" id="newSubjectModal" tabindex="-1" role="dialog" aria-labelledby="newSubjectModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Create new Subject</h4>
      </div>
      <form action="{{url('/newSubject')}}" method="get">
        <div class="modal-body">
          <div class="row">
            <div class="form-group has-feedback col-sm-12">
              <input type="text" class="form-control" placeholder="Subject name" name="name">
            </div>
          </div>
          <div class="row">
            <div class="form-group has-feedback col-sm-12">
              <input type="text" class="form-control" placeholder="Teacher's name" name="teacher">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save Subject</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.0 -->
<script src={{url('/plugins/jQuery/jQuery-2.2.0.min.js')}}></script>
<!-- Bootstrap 3.3.6 -->
<script src={{url('/bootstrap/js/bootstrap.min.js')}}></script>
<!-- Datepicker -->
<script src={{url('/plugins/datepicker/bootstrap-datepicker.js')}}></script>
<!-- AdminLTE App -->
<script src={{url('/resources/js/app.min.js')}}></script>

<script>
  //Date picker
  $('#yearStartDate').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
  });
  $('#yearEndDate').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
  });
  $('#termStartDate').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
  });
  $('#termEndDate').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
  });

  var currentYear;
  var currentTerm;
  var currentSubject;

  $(function() {
    loadYears();
  });

  $('#years').on("click", ("[name='schoolYear']"), function () {
    var yearName = this.id.split('-');
    var yearId = yearName[1];

    currentYear = yearId;
    $('[id^="year-"]').removeClass("active");
    $('#'+this.id).addClass("active");

    loadTerms(yearId);
  });

  $('#terms').on("click", ("[name='schoolTerm']"), function () {
    var termName = this.id.split('-');
    var termId = termName[1];

    currentTerm = termId;
    $('[id^="term-"]').removeClass("active");
    $('#'+this.id).addClass("active");
  });

  function loadYears() {
    $.get('{{url('/getYears')}}', function (years) {
      $('#years').html("");
      $('#subjects').html("");
      $('#terms').html("");
      $.each(years, function (key, value) {
        $('#years').append('<a class="btn btn-block btn-default box-header" id="year-'+ value.id +'" name="schoolYear">' +
                              '<h3 class="box-title">'+ value.name +'</h3>' +
                              '<div class="box-tools pull-right">' +
                                '<button class="btn btn-box-tool" type="button"><i class="fa fa-pencil"></i></button>' +
                              '</div>' +
                           '</a>');
      })
    })
  }

  function loadTerms(yearId) {
    $.get('getTerms/' + yearId, function (terms) {
      $('#terms').html("");
      $('#subjects').html("");
      $.each(terms, function (key, value) {
        $('#terms').append('<a class="btn btn-block btn-default box-header" id="term-'+value.id+'" name="schoolTerm">' +
                              '<h3 class="box-title">'+value.name+'</h3>' +
                              '<div class="box-tools pull-right">' +
                                '<button class="btn btn-box-tool" type="button"><i class="fa fa-pencil"></i></button>' +
                              '</div>' +
                           '</a>');
      })
    });
  }

</script>
</body>
</html>
