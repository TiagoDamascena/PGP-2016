@extends('layouts.master')

@section('title', 'Subject')

@section('head')
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href={{url('/plugins/datepicker/datepicker3.css')}}>
  <!-- Select2 -->
  <link rel="stylesheet" href={{url('/plugins/select2/select2.min.css')}}>
  <!-- bootstrap timepicker -->
  <link rel="stylesheet" href={{url('/plugins/timepicker/bootstrap-timepicker.css')}}>

@endsection

@section('content')
  @section('description', 'Your Subject')

  <script>subjectId = <?php echo $subject->id?></script>
  <div class="row">
    <div class="col-md-4 col-xs-12">
      <section class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Schedule</h3>
        </div>
        <div class="box-body" id="schedule">

        </div>
        <div class="box-footer">
          <button type="button" class="btn btn-primary btn-block btn-sm" data-toggle="modal" data-target="#newScheduleModal">New Schedule</button>
        </div>
      </section>
    </div>
    <div class="col-md-4 col-xs-12">
      <section class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Tasks</h3>
        </div>
        <div class="box-body" id="tasks">

        </div>
        <div class="box-footer">
          <button type="button" class="btn btn-primary btn-block btn-sm" data-toggle="modal" data-target="#newTaskModal">New Task</button>
        </div>
      </section>
    </div>
    <div class="col-md-4 col-xs-12">
      <section class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Exams</h3>
        </div>
        <div class="box-body" id="exams">

        </div>
        <div class="box-footer">
          <button type="button" class="btn btn-primary btn-block btn-sm" data-toggle="modal" data-target="#newExamModal">New Exam</button>
        </div>
      </section>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 col-xs-12">
      <button type="button" class="btn btn-warning" name="edit-subject" data-toggle="modal" data-target="#editSubjectModal"><i class="fa fa-pencil"></i>Edit Subject</button>
    </div>
  </div>
@endsection

@section('page_end')
  @include('layouts.subject_modals')
@endsection

@section('include_js')
  <!-- Datepicker -->
  <script src={{url('/plugins/datepicker/bootstrap-datepicker.js')}}></script>
  <!-- Timepicker -->
  <script src={{url('/plugins/timepicker/bootstrap-timepicker.min.js')}}></script>
  <!-- Select2 -->
  <script src={{url('/plugins/select2/select2.min.js')}}></script>

  <script src={{url('/resources/js/pages/subject.js')}}></script>
@endsection

