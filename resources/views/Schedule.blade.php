@extends('layouts.master')

@section('title', 'Schedule')

@section('head')
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href={{url('/plugins/datepicker/datepicker3.css')}}>
@endsection

@section('description', 'Edit your schedule')

@section('header')
  <div class="col-md-4">
    <button type="button" class="btn btn-primary btn-block btn-sm" data-toggle="modal" data-target="#newYearModal" id="newYear">New School Year</button>
  </div>
  <div class="col-md-4">
    <button type="button" class="btn btn-primary btn-block btn-sm" data-toggle="modal" data-target="#newTermModal" id="newTerm">New School Term</button>
  </div>
  <div class="col-md-4">
    <button type="button" class="btn btn-primary btn-block btn-sm" data-toggle="modal" data-target="#newSubjectModal" id="newSubject">New Subject</button>
  </div>
@endsection

@section('content')
  <div class="col-sm-4 col-xs-12 no-padding">
    <div class="box box-primary std-box-col">
      <div class="box-header">
        <h3 class="box-title">School Years ans Terms</h3>
      </div>
      <div class="box-body" id="years">

      </div>
      <div class="box-footer">

      </div>
    </div>
  </div>
  <div class="col-sm-8 col-xs-12 no-padding">
    <div class="box box-primary std-box-col">
      <div class="box-header">
        <h3 class="box-title">Subjects</h3>
      </div>
      <div class="box-body" id="subjects">

      </div>
      <div class="box-footer">

      </div>
    </div>
  </div>
@endsection

@section('page_end')
  @include('layouts.schedule_modals')
@endsection

@section('include_js')
  <!-- Datepicker -->
  <script src={{url('/plugins/datepicker/bootstrap-datepicker.js')}}></script>

  <script src={{url('/resources/js/pages/schedule.js')}}></script>
@endsection