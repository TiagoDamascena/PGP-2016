@extends('layouts.master')

@section('title', 'Schedule')

@section('content')
  @section('description', 'Edit your schedule')

  <div class="col-sm-4 col-xs-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">School Years</h3>
      </div>
      <div class="box-body" id="years">

      </div>
      <div class="box-footer">
        <button type="button" class="btn btn-primary btn-block btn-sm" data-toggle="modal" data-target="#newYearModal" id="newYear">New School Year</button>
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
        <button type="button" class="btn btn-primary btn-block btn-sm" data-toggle="modal" data-target="#newTermModal" id="newTerm">New School Term</button>
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
        <button type="button" class="btn btn-primary btn-block btn-sm" data-toggle="modal" data-target="#newSubjectModal" id="newSubject">New Subject</button>
      </div>
    </div>
  </div>
@endsection

@include('layouts.schedule_modals')

@section('include_js')
  <!-- Datepicker -->
  <script src={{url('/plugins/datepicker/bootstrap-datepicker.js')}}></script>

  <script src={{url('/resources/js/pages/schedule.js')}}></script>
@endsection