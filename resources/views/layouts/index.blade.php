<!DOCTYPE html>
<html lang="en">

  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-113088685-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-113088685-1');
    </script>

    <!-- CSS fancybox 3-->
      <link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.min.css">
    <style>
      body {
        background-image: url({{'/storage/'.setting('site.site_background_img')}});
        background-repeat: repeat;
      }
    </style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title')</title>



    <!-- Custom fonts for this template -->
    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="/css/clean-blog.min.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body>
  <!-- JS fancybox 3-->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/js/jquery.fancybox.min.js"></script>
  @include('partials.nav') <!-- Page Navigation -->

  @yield('header')

    <!-- Main Content -->
    <div class="container">
      @yield('content')
    </div>

    <hr>

    @include('partials.footer')<!-- footer -->

    <!-- Bootstrap core JavaScript -->
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Custom scripts for this template -->
    <script src="/js/clean-blog.min.js"></script>

  </body>

</html>
