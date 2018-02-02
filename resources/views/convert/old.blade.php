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
    <div class="container">
        <h1>Customize preview for Cropper</h1>
        <div class="row">
            <div class="col col-12" style="height: 500px">
                <img id="image" src="/img/flower1.jpg" alt="Picture">
            </div>
            <div class="col col-6">

                <table style="margin-top: 1em;">
                    <thead>

                    <th colspan="2" style="font-size: 110%; font-weight: bold; text-align: left; padding-left: 0.1em;">
                        Coordinates
                    </th>

                    </thead>
                    <tbody>
                    <tr>
                        <td style="width: 10%;"><b>previewImage.style.width:</b></td>
                        <td style="width: 30%;"><input type="text" id="x1" value="-" /></td>
                    </tr>
                    <tr>
                        <td><b>previewImage.style.height:</b></td>
                        <td><input type="text" id="y1" value="-" /></td>
                    </tr>
                    <tr>
                        <td><b>previewImage.style.marginLeft</b></td>
                        <td><input type="text" id="x2" value="-" /></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>previewImage.style.marginTop</b></td>
                        <td><input type="text" id="y2" value="-" /></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-success" data-method="getCroppedCanvas" data-option="{ &quot;maxWidth&quot;: 4096, &quot;maxHeight&quot;: 4096 }">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.getCroppedCanvas({ maxWidth: 4096, maxHeight: 4096 })">
              Get Cropped Canvas
            </span>
                </button>
            </div>
            <div class="col col-6">
                <div class="preview"></div>
            </div>

            <!-- Show the cropped image in modal -->
            <div class="modal fade docs-cropped" id="getCroppedCanvasModal" role="dialog" aria-hidden="true" aria-labelledby="getCroppedCanvasTitle" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="getCroppedCanvasTitle">Cropped</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a class="btn btn-primary" id="download" href="javascript:void(0);" download="cropped.jpg">Download</a>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal -->
        </div>
    </div>

    <script>
        function each(arr, callback) {
            var length = arr.length;
            var i;

            for (i = 0; i < length; i++) {
                callback.call(arr, arr[i], i, arr);
            }

            return arr;
        }

        window.addEventListener('DOMContentLoaded', function () {
            var image = document.querySelector('#image');
            var previews = document.querySelectorAll('.preview');
            var cropper = new Cropper(image, {
                minCropBoxWidth: 100,
                minCropBoxHeight: 50,
                //aspectRatio: 16 / 4,
                movable: false,
                zoomable: false,
                rotatable: false,
                scalable: false,
                strict: true,
                viewMode:1,
                width: 160,
                height: 90,
                minWidth: 256,
                minHeight: 256,
                maxWidth: 4096,
                maxHeight: 4096,
                fillColor: '#fff',
                imageSmoothingEnabled: false,
                imageSmoothingQuality: 'high',
                ready: function () {
                    var clone = this.cloneNode();

                    clone.className = ''
                    clone.style.cssText = (
                        'display: block;' +
                        'width: 100%;' +
                        'height: 100%;' +
                        'min-width: 0;' +
                        'min-height: 0;' +
                        'max-width: none;' +
                        'max-height: none;'
                    );

                    each(previews, function (elem) {
                        elem.appendChild(clone.cloneNode());
                    });
                },

                crop: function (e) {
                    var data = e.detail;
                    var cropper = this.cropper;
                    var imageData = cropper.getImageData();
                    var previewAspectRatio = data.width / data.height;

                    each(previews, function (elem) {
                        var previewImage = elem.getElementsByTagName('img').item(0);
                        var previewWidth = elem.offsetWidth;
                        var previewHeight = previewWidth / previewAspectRatio;
                        var imageScaledRatio = data.width / previewWidth;

                        elem.style.height = previewHeight + 'px';
                        previewImage.style.width = imageData.naturalWidth / imageScaledRatio + 'px';
                        previewImage.style.height = imageData.naturalHeight / imageScaledRatio + 'px';
                        previewImage.style.marginLeft = -data.x / imageScaledRatio + 'px';
                        previewImage.style.marginTop = -data.y / imageScaledRatio + 'px';

                        document.getElementById("x1").value = imageData.naturalWidth / imageScaledRatio + 'px';
                        document.getElementById("y1").value = imageData.naturalHeight / imageScaledRatio + 'px';
                        document.getElementById("x2").value = -data.x / imageScaledRatio + 'px';
                        document.getElementById("y2").value = -data.y / imageScaledRatio + 'px';
                        //document.getElementById("w").value
                        //document.getElementById("h").value
                    });
                }
            });
        });
    </script>
    <script src="/js/cropper/cropper.js"></script>
    <script src="/js/cropper/main.js"></script>
@stop
