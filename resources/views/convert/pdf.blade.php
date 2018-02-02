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
        <style type="text/css">

            #load-button {
                width: 150px;
                display: block;
                margin: 20px auto;
            }

            #pdf-main-container {
                width: 400px;
                margin: 20px auto;
            }

            #pdf-loader {
                display: none;
            }

            #pdf-loading-bar {
                width: 150px;
                margin: 0 auto;
                border: 1px solid #cccccc;
                padding: 5px;
                height: 30px;
            }

            #pdf-loading-completed {
                display: inline-block;
                background-color: #2980b9;
                height: 100%;
            }

            #pdf-contents {
                display: none;
            }

            #pdf-meta {
                overflow: hidden;
                margin: 0 0 20px 0;
            }

            #pdf-buttons {
                float: left;
            }

            #page-count-container {
                float: right;
            }

            #pdf-current-page {
                display: inline;
            }

            #pdf-total-pages {
                display: inline;
            }

            #pdf-canvas {
                border: 1px solid rgba(0,0,0,0.2);
                box-sizing: border-box;
            }

            #page-loader {
                height: 100px;
                line-height: 100px;
                text-align: center;
                display: none;
                color: #999999;
                font-size: 13px;
            }

        </style>
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
    <!-- Content -->
    <button id="load-button">Load PDF</button>

    <div id="pdf-main-container">
        <div id="pdf-loader">
            <div id="pdf-loading-bar"><div id="pdf-loading-completed"></div></div>
        </div>
        <div id="pdf-contents">
            <div id="pdf-meta">
                <div id="pdf-buttons">
                    <button id="pdf-prev">Previous</button>
                    <button id="pdf-next">Next</button>
                </div>
                <div id="page-count-container">Page <div id="pdf-current-page"></div> of <div id="pdf-total-pages"></div></div>
            </div>
            <canvas id="pdf-canvas" width="400"></canvas>
            <div id="page-loader">Loading page ...</div>
            <a id="download-image" href="#">Download PNG</a>
        </div>
    </div>

    <script>

        var __PDF_DOC,
            __CURRENT_PAGE,
            __TOTAL_PAGES,
            __PAGE_RENDERING_IN_PROGRESS = 0,
            __CANVAS = $('#pdf-canvas').get(0),
            __CANVAS_CTX = __CANVAS.getContext('2d');

        function showPDF(pdf_url) {
            $("#load-button").hide();
            $("#pdf-loader").show();

            PDFJS.getDocument({ url: pdf_url }, false, null, function(progress) {
                var percent_loaded = (progress.loaded/progress.total)*100;

                $("#pdf-loading-completed").css('width', percent_loaded + '%');
            }).then(function(pdf_doc) {
                __PDF_DOC = pdf_doc;
                __TOTAL_PAGES = __PDF_DOC.numPages;

                // Hide the pdf loader and show pdf container in HTML
                $("#pdf-loader").hide();
                $("#pdf-contents").show();
                $("#pdf-total-pages").text(__TOTAL_PAGES);

                // Show the first page
                showPage(1);
            }).catch(function(error) {
                // If error re-show the upload button
                $("#pdf-loader").hide();
                $("#load-button").show();

                alert(error.message);
            });;
        }

        function showPage(page_no) {
            __PAGE_RENDERING_IN_PROGRESS = 1;
            __CURRENT_PAGE = page_no;

            // Disable Prev & Next buttons while page is being loaded
            $("#pdf-next, #pdf-prev").attr('disabled', 'disabled');

            // While page is being rendered hide the canvas and show a loading message
            $("#pdf-canvas").hide();
            $("#page-loader").show();

            // Update current page in HTML
            $("#pdf-current-page").text(page_no);

            // Fetch the page
            __PDF_DOC.getPage(page_no).then(function(page) {
                // As the canvas is of a fixed width we need to set the scale of the viewport accordingly
                var scale_required = __CANVAS.width / page.getViewport(1).width;

                // Get viewport of the page at required scale
                var viewport = page.getViewport(scale_required);

                // Set canvas height
                __CANVAS.height = viewport.height;

                var renderContext = {
                    canvasContext: __CANVAS_CTX,
                    viewport: viewport
                };

                // Render the page contents in the canvas
                page.render(renderContext).then(function() {
                    __PAGE_RENDERING_IN_PROGRESS = 0;

                    // Re-enable Prev & Next buttons
                    $("#pdf-next, #pdf-prev").removeAttr('disabled');

                    // Show the canvas and hide the page loader
                    $("#pdf-canvas").show();
                    $("#page-loader").hide();
                });
            });
        }


        $("#load-button").on('click', function() {
            showPDF('/storage/{{ $file->download_link }}');
        });

        // Previous page of the PDF
        $("#pdf-prev").on('click', function() {
            if(__CURRENT_PAGE != 1)
                showPage(--__CURRENT_PAGE);
        });

        // Next page of the PDF
        $("#pdf-next").on('click', function() {
            if(__CURRENT_PAGE != __TOTAL_PAGES)
                showPage(++__CURRENT_PAGE);
        });
        $(".download-link").on('click', function() {
            var page_title = $("#post-header h1").text(),
                download_link = $(this).attr('href');

            ga('send', 'event', 'Download Link', 'click', page_title);
        });
        // Download button (JPEG with quality 80%)
        $("#download-image").on('click', function() {
            $(this).attr('href', $('#pdf-canvas').get(0).toDataURL("image/jpeg", 1));

            // Specfify download option with name
            $(this).attr('download', 'page.jpg');
        });


    </script>
    <script src="/js/pdf/pdf.js"></script>
    <script src="/js/pdf/pdf.worker.js"></script>
@stop
