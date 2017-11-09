<html>
<head>
    <title>Laradrop Demo</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/vendor/jasekz/laradrop/css/styles.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet" type="text/css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js" ></script>
    <script src="/vendor/jasekz/laradrop/js/enyo.dropzone.js"></script>
    <script src="/vendor/jasekz/laradrop/js/laradrop.js"></script>
</head>
<body>
<div class="laradrop"> </div>
</body>
<script>
    jQuery(document).ready(function(){
        jQuery('.laradrop').laradrop();
    });
</script>
</html>