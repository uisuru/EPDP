<html>
<head>
    <title>Upload Files</title>
    <link href="/vendor/jasekz/laradrop/css/styles.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet" type="text/css">
    <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js" ></script>-->
    <script src="/js/laradrop/jquery1.11.2.min.js"></script>
    <link href="/js/laradrop/bootstrap3.3.6.min.css" rel="stylesheet" type="text/css">
    <script src="/js/laradrop/jquery-ui1.11.4.min.js"></script>

    <script src="/vendor/jasekz/laradrop/js/enyo.dropzone.js"></script>
    <script src="/vendor/jasekz/laradrop/js/laradrop.js"></script>
<!--<script src="/vendor/jasekz/laradrop/js/laradrop.js"></script>-->
</head>
<body>
<div class="laradrop"> </div>
</body>
<script>
    jQuery(document).ready(function(){
        // With custom params:
        jQuery('.laradrop').laradrop({
            breadCrumbRootText: '{{ Auth::user()->name }} - Root Folder', // optional
            actionConfirmationText: 'Sure about that?', // optional
            onInsertCallback: function (obj){ // optional
                // if you need to bind the select button, implement here
                alert('Thumb src: '+obj.src+'. File ID: '+obj.id+'.  Please implement onInsertCallback().');
            },
            onErrorCallback: function(msg){ // optional
                // if you need an error status indicator, implement here
                alert('An error occured: '+msg);
            },
            onSuccessCallback: function(serverRes){ // optional
                // if you need a success status indicator, implement here
            }
        });
    });
</script>
</html>