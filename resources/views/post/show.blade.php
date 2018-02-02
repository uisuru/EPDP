@extends('layouts.index')
@section('title','EPDP - '.$post->title)
@section('header')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('/storage/{{$post->image}}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <div style="height: 30px"></div>
                        <h2>{{$post -> title}}</h2>
                        <h4>{{$post -> excerpt}}</h4>
                        <span class="meta">Posted by
                <a href="/profile/{{$post -> author->username}}">{{$post->author->name}}</a>
                on {{$post->created_at->format('F d, Y')}}</span>
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
                    {!! $post->bodyImage !!}
                    {!! $post->body !!}
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <hr style="height: 1px;margin-bottom:-3px;background-image: -webkit-linear-gradient(left, rgba(66,133,244,.8), rgb(84, 253, 122), rgb(255, 53, 53));"/>
                    <h3>Answers</h3>
                    @foreach($post->answers as $answer)
                        @if($answer->approved)
                            <div class="card w-100">
                                <div class="card-header" style="padding: .5rem 0.2rem;margin-bottom: 5px;">
                                    Answered at
                                    {{$answer->updated_at->format("F j, Y, g:i a")}}
                                   By <a href="/profile/{{$answer -> author ->username}}">{{$answer->author->name}}</a>
                                </div>
                                <div class="card-block" style="margin-top: 10px">
                                    {!!html_entity_decode($answer->answer)!!}
                                </div>
                            </div>
                            <hr style="height: 1px;margin-bottom:10px;margin-top:30px;background-image: -webkit-linear-gradient(left,  #656565, #d1e0e9);"/>
                        @endif
                    @endforeach
                </div>
            </div>


            <script type="text/javascript">
                $(document).ready(function() {
                    $('#summernote').summernote({
                        height: "300px",
                        toolbar: [
                            // [groupName, [list of button]]
                            ['style', ['bold', 'italic', 'underline', 'clear']],
                            ['font', ['strikethrough', 'superscript', 'subscript']],
                            ['fontsize', ['fontsize']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['height', ['height']],
                            ['link',['link']],
                            ['picture',['picture']]
                        ]
                    });
                });
                var postForm = function() {
                    var content = $('textarea[name="answer"]').html($('#summernote').code());
                }
            </script>
            <div class="row">
                <div id="comment-form" class="col-md-8 col-md-offset-2">
                    {{Form::open(['route'=>['answers.store',$post->id,'method'=>'POST']])}}
                    <div class="row">
                        <div class="col-md-6">
                            {{Form::hidden('user_id',Auth::id())}}
                        </div>
                        <div class="col-md-12">
                            {{Form::label('answer',"Provide an Answer:")}}
                            <textarea class="input-block-level" id="summernote" name="answer" rows="5"></textarea>
                            {{Form::submit('Add Answer',['class'=>'btn btn-success'])}}
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
            <link href="/js/summernote/summernote-bs4.css" rel="stylesheet">
            <script src="/js/summernote/summernote-bs4.js"></script>
        </div>
    </article>
    <hr>
@stop