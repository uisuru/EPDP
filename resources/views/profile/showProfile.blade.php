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
            <h1>User - {{$user->name}}</h1>
            <hr>
            <div class="row">

                <div class="container bootstrap snippet">
                    <div class="panel-body inf-content">
                        <div class="row">
                            <div class="col-md-4" align="center">
                                <img height="275" width="275" src="/storage/{{$user->avatar}}"
                                     class="rounded-circle" alt="Avatar not Found or Load Error">
                                <ul title="Ratings" class="list-inline ratings text-center">
                                    <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                                    <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                                    <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                                    <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                                    <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <strong>User Profile Information</strong><br>
                                <div class="table-responsive">
                                    <table class="table table-condensed table-responsive table-user-information">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-user  text-primary"></span>
                                                    Name
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                {{$user->name}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-cloud text-primary"></span>
                                                    Lastname
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                {{$user->lastname}}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-bookmark text-primary"></span>
                                                    Username
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                {{$user->username}}
                                            </td>
                                        </tr>


                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-eye-open text-primary"></span>
                                                    Role of the site
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                {{$user->authorRole->name}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-envelope text-primary"></span>
                                                    Email
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                {{$user->email}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-calendar text-primary"></span>
                                                    Created
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                {{$user->created_at}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>
                                                    <span class="glyphicon glyphicon-calendar text-primary"></span>
                                                    Modified
                                                </strong>
                                            </td>
                                            <td class="text-primary">
                                                {{$user->updated_at}}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop