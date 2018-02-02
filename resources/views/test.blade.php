<html>

<body>
<form action="{{url('/test')}}" enctype="multipart/form-data" method="post" name="f1">
    {{ csrf_field() }}
    <input id="templateDoc" name="templateDoc" type="file" />

    <input type="submit" />

</form>

</body>

</html>