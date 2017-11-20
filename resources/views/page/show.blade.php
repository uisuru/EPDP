@extends('layouts.index')
@section('title','EPDP - '.$page->title)
@section('header')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('/storage/{{$page->image}}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>{{$page -> title}}</h1>
                        <h2 class="subheading">{{$page->excerpt}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
@stop
@section('content')
    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    {!! $page->body !!}
                </div>
            </div>
        </div>
    </article>
    <hr>
@stop