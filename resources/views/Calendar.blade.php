@extends('layouts.master')

@section('title', 'Calendar')

@section('head')
    <!-- Full Calendar -->
    <link rel="stylesheet" href={{url('/plugins/fullcalendar/fullcalendar.min.css')}}>
@endsection

@section('content')
    @section('description', 'Your Calendar')

    <div class="col-md-8 col-xs-12">
        <div class="box box-primary">
            <div class="box-body" id="calendar">

            </div>
        </div>
    </div>
    <div class="col-md-4 col-xs-12">
        <div class="box box-primary">
            <div class="box-body" id="detail">

            </div>
        </div>
    </div>
@endsection

@section('include_js')
    <!-- Moment -->
    <script src={{url('/plugins/moment/moment.min.js')}}></script>
    <!-- Full Calendar -->
    <script src={{url('/plugins/fullcalendar/fullcalendar.min.js')}}></script>

    <script src={{url('/resources/js/pages/calendar.js')}}></script>
@endsection