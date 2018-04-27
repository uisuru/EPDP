@extends('layouts.index')
@section('title', setting('site.title'))
@section('header')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('/img/home-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>EPDP</h1>
                        <span class="subheading">Exam Paper Discussion Platform</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 mx-auto">
            <h1>Edit Profile</h1>
            <hr>
            <div class="row">
                <!-- left column -->
                <div class="col-md-3">
                    <div class="text-center">
                        <div>
                            <!--
                            style="width: 200px;height: 150px;overflow: hidden;"
                            style=" width: 200px;height: 200px;margin: -75px 0 0 -100px;"
                            -->
                            <img height="200" width="200" src="/storage/{{ Auth::user()->avatar }}"
                                 class="rounded-circle" alt="Avatar not Found or Load Error">
                        </div>
                        <h6>Upload a different photo...</h6>
                        @if(count($errors))
                            <div class="alert alert-info alert-dismissable">
                                @foreach($errors->all() as $error)
                                    <a class="panel-close close" data-dismiss="alert">×</a>
                                    <i class="fa fa-warning"></i>
                                    <strong>{{$error}}</strong>
                                @endforeach
                            </div>
                        @endif
                        <div class="form-control">
                            {!! Form::open(array('url'=> '/profileAvatar','files'=>true)) !!}
                            {!! Form::file('file') !!}
                            {!! Form::token() !!}
                            <br><br>
                            {!! Form::submit('Upload') !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="text-center">
                            <hr>
                            <form action="profilePassword" method="post">
                                <div class="modal-header">
                                    <h3>Change Password <span class="extra-title muted"></span></h3>
                                </div>
                                <div class="flash-message">
                                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                        @if(Session::has('alert-' . $msg))

                                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a
                                                        href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            </p>
                                        @endif
                                    @endforeach
                                </div> <!-- end .flash-message -->
                                <div class="modal-body form-horizontal">
                                    <div class="control-group">
                                        <label for="current_password" class="control-label">Current Password</label>
                                        <div class="controls">
                                            <input type="password" name="current_password">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="new_password" class="control-label">New Password</label>
                                        <div class="controls">
                                            <input type="password" name="new_password">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="confirm_password" class="control-label">Confirm Password</label>
                                        <div class="controls">
                                            <input type="password" name="confirm_password">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="control-group">
                                        <button href="#" class="btn btn-primary" id="password_modal_save">Save
                                            Password
                                        </button>
                                    </div>
                                </div>
                                {!! Form::token() !!}
                            </form>
                        </div>
                    </div>
                </div>

                <!-- edit form column -->
                <div class="col-md-9 personal-info">
                    <h3>Personal info</h3>
                    <div class="alert alert-info alert-dismissable">
                        <a class="panel-close close" data-dismiss="alert">×</a>
                        <i class="fa fa-info"></i>
                        You Can't Change Username and Email Address. If you want do so please contact the Administrator.
                    </div>
                    <div class="flash-message">
                        @foreach (['danger', 'warning', 'succes', 'info'] as $msg)
                            @if(Session::has('alert-' . $msg))

                                <p class="alert alert-{{ $msg.'s' }}">{{ Session::get('alert-' . $msg) }} <a
                                            href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                </p>
                            @endif
                        @endforeach
                    </div> <!-- end .flash-message -->
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="{{$user->email}}" readonly>
                    </div>

                    <label class="col-md-3 control-label">Username:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{$user->username}}" readonly>
                    </div>
                    <form class="form-horizontal" role="form" action="/profileUpdate" method="post">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">First name:</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="name" type="text" value="{{$user->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Last name:</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="lname" type="text" value="{{$user->lName}}">
                            </div>
                        </div>
                        {!! Form::token() !!}
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-primary" value="Save Changes">
                                <span></span>
                                <input type="reset" class="btn btn-default" value="Cancel">
                            </div>
                        </div>
                    </form>

                    <label class="col-lg-3 control-label">Created at:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="{{$user->created_at}}" readonly>
                    </div>
                    <label class="col-lg-3 control-label">Updated at:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="{{$user->updated_at}}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop