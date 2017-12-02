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
        <div class="col-lg-8 col-md-10 mx-auto">
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