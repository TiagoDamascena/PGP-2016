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

@section('description', 'Your Subject')

@section('header')
  <button type="button" class="btn btn-warning pull-right" name="edit-subject" data-toggle="modal" data-target="#editSubjectModal"><i class="fa fa-pencil"></i>Edit Subject</button>
@endsection

@section('content')
  <script>subjectId = <?php echo $subject->id?>;</script>
    <div class="col-md-4 col-xs-12 no-padding">
      <section class="box box-primary text-center std-box-col">
        <div class="box-header with-border">
          <h3 class="box-title">Schedule</h3>
        </div>
        <div class="box-footer">
          <button type="button" class="btn btn-primary btn-block btn-sm std-btn" data-toggle="modal" data-target="#newScheduleModal">New Schedule</button>
        </div>
        <div class="box-body" id="schedule">

        </div>
      </section>
    </div>
    <div class="col-md-4 col-xs-12 no-padding">
      <section class="box box-primary text-center std-box-col">
        <div class="box-header with-border">
          <h3 class="box-title">Tasks</h3>
        </div>
        <div class="box-footer">
          <button type="button" class="btn btn-success btn-block btn-sm std-btn" data-toggle="modal" data-target="#newTaskModal">New Task</button>
        </div>
        <div class="box-body" id="tasks">

        </div>
      </section>
    </div>
    <div class="col-md-4 col-xs-12 no-padding">
      <section class="box box-primary text-center std-box-col">
        <div class="box-header with-border">
          <h3 class="box-title">Exams</h3>
        </div>
        <div class="box-footer">
          <button type="button" class="btn btn-warning btn-block btn-sm std-btn" data-toggle="modal" data-target="#newExamModal">New Exam</button>
        </div>
        <div class="box-body" id="exams">

        </div>
      </section>
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

