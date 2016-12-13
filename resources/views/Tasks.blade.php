@extends('layouts.master')

@section('title', 'Tasks')

@section('description', 'All your Tasks in one place')

@section('content')
<div class="col-sm-4 col-xs-12">
    <div class="box box-danger">
        <div class="box-header text-center">
            <h3 class="box-title">Past Tasks</h3>
        </div>
        <div class="box-body text-center" id="past-task">

        </div>
    </div>
</div>
<div class="col-sm-4 col-xs-12">
    <div class="box box-warning">
        <div class="box-header text-center">
            <h3 class="box-title">Due Next Week</h3>
        </div>
        <div class="box-body text-center" id="present-task">

        </div>
    </div>
</div>
<div class="col-sm-4 col-xs-12">
    <div class="box box-primary">
        <div class="box-header text-center">
            <h3 class="box-title te">Future Tasks</h3>
        </div>
        <div class="box-body text-center " id="future-task">

        </div>
    </div>
</div>

@endsection

@section('include_js')
    <script src={{url('/resources/js/pages/task.js')}}></script>
@endsection
