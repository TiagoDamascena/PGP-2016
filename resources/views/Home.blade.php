@extends('layouts.master')

@section('title', 'Home')

@section('description', 'Your home page')

@section('content')
    <div class="col-md-4 col-xs-12 no-padding">
        <div class="box box-primary std-box-col">
            <div class="box-header text-center">
                <h3 class="box-title">Classes</h3>
            </div>
            <div class="box-body text-center" id="classes">

            </div>
        </div>
    </div>
    <div class="col-md-4 col-xs-12 no-padding">
        <div class="box box-warning std-box-col">
            <div class="box-header text-center">
                <h3 class="box-title">Tasks</h3>
            </div>
            <div class="box-body text-center" id="tasks">

            </div>
        </div>
    </div>
    <div class="col-md-4 col-xs-12 no-padding">
        <div class="box box-success std-box-col">
            <div class="box-header text-center">
                <h3 class="box-title">Exams</h3>
            </div>
            <div class="box-body text-center" id="exams">

            </div>
        </div>
    </div>
@endsection

@section('include_js')
    <script src={{url('/resources/js/pages/home.js')}}></script>
@endsection