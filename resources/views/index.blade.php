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
        <style>
            .dropdown.dropdown-lg .dropdown-menu {
                margin-top: -1px;
                padding: 6px 20px;
            }

            .input-group .form-control {
                width: 100%;
            }

            .input-group-btn .btn-group {
                display: flex !important;
            }

            .btn-group .btn {
                border-radius: 0;
                margin-left: -1px;
            }

            .btn-group .btn:last-child {
                border-top-right-radius: 4px;
                border-bottom-right-radius: 4px;
            }

            .btn-group .form-horizontal .btn[type="submit"] {
                border-top-left-radius: 4px;
                border-bottom-left-radius: 4px;
            }

            .form-horizontal .form-group {
                margin-left: 0;
                margin-right: 0;
            }

            .form-group .form-control:last-child {
                border-top-left-radius: 4px;
                border-bottom-left-radius: 4px;
            }

            @media screen and (min-width: 768px) {
                #adv-search {
                    width: 500px;
                    margin: 0 auto;
                }

                .dropdown.dropdown-lg {
                    position: static !important;
                }

                .dropdown.dropdown-lg .dropdown-menu {
                    min-width: 500px;
                }
            }
        </style>
    </header>
@stop
@section('content')
    <form class="form-horizontal" role="form" action="/search" method="post">
    {!! Form::token() !!}
    <div class="row">
        <div class="col-md-12">
            <div class="input-group" id="adv-search" style="width: 100%">
                <input type="text" name="search" class="form-control" placeholder="Search for luck" required/>
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i>
                            Search
                        </button>
                    </div>
                    <button type="button" onclick="location.href = '/ask';"
                            class="btn btn-success"><i class="fa fa-question" aria-hidden="true"></i> Ask new Question
                    </button>
                </div>
            </div>
        </div>
    </div>
    </form>

    <div class="row">
        <div class="col-lg-10 col-md-8 mx-left">
        @foreach($posts as $post)
            @include('partials.post',['post' => $post])
        @endforeach
        <!-- Pager -->
            <div class="clearfix">
            {{$posts->links()}}
            <!--<a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>-->
            </div>
        </div>
    </div>
@stop