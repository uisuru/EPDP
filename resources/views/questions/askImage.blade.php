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
                        <span class="subheading">Ask a new Question</span>
                    </div>
                </div>
            </div>
        </div>
        <style>
            div.frame {
                background: #fff;
                padding: 0.5em;
                border: solid 1px #ddd;
            }

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
        <link rel="stylesheet" href="/css/cropper/cropper.css">
        <link rel="stylesheet" href="/css/cropper/main.css">
        <style>
            /*.container {
                max-width: 960px;
                margin: 20px auto;
            }*/
            img {
                max-width: 100%;
            }

            .row,
            .preview {
                overflow: hidden;
            }

            .col {
                float: left;
            }

            .col-6 {
                width: 50%;
            }

            .col-3 {
                width: 25%;
            }

            .col-2 {
                width: 16.7%;
            }

            .col-1 {
                width: 8.3%;
            }
        </style>
    </header>
@stop
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <script type="text/javascript">
        $(document).ready(function () {
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
                    ['link', ['link']],
                    ['picture', ['picture']]
                ]
            });
        });
        $(document).ready(function () {
            $('#summernoteImage').summernote({
                height: "300px",
                toolbar: [
                ]
            });
        });
        var postForm = function () {
            var content = $('textarea[name="question"]').html($('#summernote').code());
        }
        var postForm = function () {
            var content = $('textarea[name="question"]').html($('#summernoteImage').code());
        }
    </script>
    <div class="row">
                <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">

                    {{Form::open(['route'=>['ask.store',Auth::id(),'method'=>'POST']])}}
                    {!! Form::token() !!}
                    <div class="row">
                        <div class="col-md-12">
                            <label for="name">Title</label>
                            <input required="" type="text" class="form-control" name="title"
                                   placeholder="Title for Question" value="">
                        </div>
                        <div class="col-md-12">
                            <label for="name">Subtitle</label>
                            <input type="text" class="form-control" name="excerpt"
                                   placeholder="Subtitle for Question - Optional" value="">
                        </div>
                        <div class="col-md-12">

                            <label for="name">Question Category</label>
                            <select class="form-control select2 select2-hidden-accessible" name="category_id"
                                    tabindex="-1" aria-hidden="true">

                                @foreach($categories as $category)
                                    <option value=" {{$category->id}}"> {{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="question">Question in details</label>
                            <textarea class="input-block-level" id="summernote" name="body"
                                      rows="5"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="question">Question Image</label>
                            <textarea class="input-block-level" id="summernoteImage" name="bodyImage"
                                      rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div style="width:1px; border-left: thin solid #cfcfcf;"></div>
                <div class="row col-6">

                    <label for="name">Select an Exam Paper</label>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- <h3>Demo:</h3> -->
                                <div class="img-container">
                                    <img src="{{asset($file->destination_path)}}" alt="Picture">
                                </div>
                            </div>

                        </div>
                        <div class="row" id="actions">
                            <div class="col-md-9 docs-buttons">
                                <!-- <h3>Toolbar:</h3> -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-method="setDragMode"
                                            data-option="move"
                                            title="Move">
            <span class="docs-tooltip" data-toggle="tooltip" title="Move">
              <span class="fa fa-arrows"></span>
            </span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-method="setDragMode"
                                            data-option="crop"
                                            title="Crop">
            <span class="docs-tooltip" data-toggle="tooltip" title="Crop">
              <span class="fa fa-crop"></span>
            </span>
                                    </button>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-method="zoom" data-option="0.1"
                                            title="Zoom In">
            <span class="docs-tooltip" data-toggle="tooltip" title="Zoom In">
              <span class="fa fa-search-plus"></span>
            </span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1"
                                            title="Zoom Out">
            <span class="docs-tooltip" data-toggle="tooltip" title="Zome Out">
              <span class="fa fa-search-minus"></span>
            </span>
                                    </button>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-method="move" data-option="-10"
                                            data-second-option="0" title="Move Left">
            <span class="docs-tooltip" data-toggle="tooltip" title="Move Left">
              <span class="fa fa-arrow-left"></span>
            </span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-method="move" data-option="10"
                                            data-second-option="0" title="Move Right">
            <span class="docs-tooltip" data-toggle="tooltip" title="Move Right">
              <span class="fa fa-arrow-right"></span>
            </span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-method="move" data-option="0"
                                            data-second-option="-10" title="Move Up">
            <span class="docs-tooltip" data-toggle="tooltip" title="Move Up">
              <span class="fa fa-arrow-up"></span>
            </span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-method="move" data-option="0"
                                            data-second-option="10" title="Move Down">
            <span class="docs-tooltip" data-toggle="tooltip" title="Move Down">
              <span class="fa fa-arrow-down"></span>
            </span>
                                    </button>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-method="scaleX" data-option="-1"
                                            title="Flip Horizontal">
            <span class="docs-tooltip" data-toggle="tooltip" title="Flip Horizontal">
              <span class="fa fa-arrows-h"></span>
            </span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-method="scaleY" data-option="-1"
                                            title="Flip Vertical">
            <span class="docs-tooltip" data-toggle="tooltip" title="Flip Vertical">
              <span class="fa fa-arrows-v"></span>
            </span>
                                    </button>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-method="reset" title="Reset">
            <span class="docs-tooltip" data-toggle="tooltip" title="Reset">
              <span class="fa fa-refresh"></span>
            </span>
                                    </button>
                                    <label class="btn btn-primary btn-upload" for="inputImage"
                                           title="Upload image file">
                                        <input type="file" class="sr-only" id="inputImage" name="file"
                                               accept=".jpg,.jpeg,.png,.bmp">
                                        <span class="docs-tooltip" data-toggle="tooltip" title="Upload image file">
              <span class="fa fa-upload"></span>
            </span>
                                    </label>
                                </div>

                                <div class="btn-group btn-group-crop">
                                    <button type="button" class="btn btn-success" data-method="getCroppedCanvas"
                                            data-option="{ &quot;maxWidth&quot;: 4096, &quot;maxHeight&quot;: 4096 }">
            <span class="docs-tooltip" data-toggle="tooltip"
                  title="Select this area">
              Select this area
            </span>
                                    </button>
                                </div>

                                <!-- Show the cropped image in modal -->
                                <div class="modal fade docs-cropped" id="getCroppedCanvasModal" role="dialog"
                                     aria-hidden="true"
                                     aria-labelledby="getCroppedCanvasTitle" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="getCroppedCanvasTitle">Are you sure you
                                                    select correct location for the question?</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body"></div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <a class="btn btn-primary" id="download"
                                                   href="{{ route('test1')}}/javascript:void(0)"
                                                >Download as a image</a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.modal -->

                                <!-- <img name="img" id="imgElem">-->

                                <div class="col-md-3 docs-toggles">

                                </div><!-- /.docs-toggles -->
                            </div>
                        </div>
                        {{Form::submit('Post Question',['class'=>'btn btn-success'])}}
                        {{Form::close()}}
                    </div>
                    <script src="/js/cropper/cropper.js"></script>
                    <script src="/js/cropper/mainask.js"></script>
                    <link href="/js/summernote/summernote-bs4.css" rel="stylesheet">
                    <script src="/js/summernote/summernote-bs4.js"></script>
                </div>
            </div>
        </div>
    </div>
@stop
