@extends('layouts.master')

@section('title', 'Settings')
@section('description', 'Edit your account settings')

@section('content')

    <div class="col-md-6 no-padding">
        <div class="box box-warning std-box">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="ion-locked"></i> Change Password</h3>
            </div>
            <div class="box-body">
                <form action="{{url('/changePassword')}}" method="get">
                    @if($settingsFeedback=='password_do_not_match')
                        <span class="text-danger"> Passwords do not match </span>
                    @endif
                    <div class="row">
                        <div class="form-group has-feedback col-md-12">
                            <input type="password" class="form-control" placeholder="New password" name="password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group has-feedback col-md-12">
                            <input type="password" class="form-control" placeholder="Retype new password" name="confirmPassword">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-warning btn-block btn-sm">Change Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6 no-padding">
        <div class="box box-danger std-box">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="ion-email"></i> Change Email</h3>
            </div>
            <div class="box-body">
                <form action="{{url('/changeEmail')}}" method="get">
                    @if($settingsFeedback=='email_do_not_match')
                        <span class="text-danger"> Emails do not match </span>
                    @endif
                    <div class="row">
                        <div class="form-group has-feedback col-md-12">
                            <input type="email" class="form-control" placeholder="New email" name="email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group has-feedback col-md-12">
                            <input type="email" class="form-control" placeholder="Retype new email" name="confirmEmail">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-danger btn-block btn-sm">Change Email</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6 no-padding">
        <div class="box box-warning std-box">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="ion-edit"></i> Change Name</h3>
            </div>
            <div class="box-body">
                <form action="{{url('/changeName')}}" method="get">
                    <div class="row">
                        <div class="form-group has-feedback col-md-12">
                            <input type="text" class="form-control" placeholder="New name" name="name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-warning btn-block btn-sm">Change Name</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6 no-padding">
        <div class="box box-danger std-box">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="ion-locked"></i> Delete Account</h3>
            </div>
            <div class="box-body">
                <form action="{{url('/deleteUser')}}" method="get">
                    <div class="row">
                        <div class="form-group has-feedback col-md-12">
                            <input type="password" class="form-control" placeholder="Retype new password" name="confirmPassword">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-danger btn-block btn-sm" onClick="confirmDelete()">Delete Account</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

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
