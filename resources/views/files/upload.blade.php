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
                        <br>
                        <h2>File Upload Section</h2>
                        <span class="subheading">My Folder - User : {{Auth::user()->name}}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@stop
@section('content')
    <div class="row">
        @if(count($errors))
            <div class="alert alert-info alert-dismissable">
                @foreach($errors->all() as $error)
                    <a class="panel-close close" data-dismiss="alert">×</a>
                    <i class="fa fa-coffee"></i>
                    <strong>{{$error}}</strong>
                @endforeach
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-md-6">
            {!! Form::open(array('url'=> '/handleUpload','files'=>true)) !!}
            {!! Form::file('file') !!}
            <div class="row">
                <div class="col-md-6">
                    <label for="name">Upload Category</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <select class="form-control select2 select2-hidden-accessible" name="category_id"
                            tabindex="-1" aria-hidden="true">
                        @foreach($categories as $category)
                            <option value=" {{$category->id}}"> {{$category->name}}</option>
                        @endforeach
                    </select>
                    {!! Form::token() !!}
                    {!! Form::submit('Upload') !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <br>


    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#img" role="tab">My Image Files</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#pdf" role="tab">My PDF Files</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#all" role="tab">All File In The Server</a>
        </li>
    </ul>
    <style>
        * {
            box-sizing: border-box;
        }

        #myInput1, #myInput2, #myInput3 {
            background-image: url('/img/searchicon.png');
            background-position: 10px 10px;
            background-repeat: no-repeat;
            width: 100%;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
        }

        #myTable1, #myTable2, #myTable3 {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ddd;
            font-size: 18px;
        }

        #myTable1 th, #myTable2 th, #myTable3 th, #myTable1 td, #myTable2 td, #myTable3 td {
            text-align: left;
            padding: 12px;
        }

        #myTable1 tr, #myTable2 tr, #myTable3 tr {
            border-bottom: 1px solid #ddd;
        }

        #myTable1 tr.header, #myTable2 tr.header, #myTable3 tr.header, #myTable1 tr:hover, #myTable2 tr:hover, #myTable3 tr:hover {
            background-color: #f1f1f1;
        }
    </style>
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="img" role="tabpanel">
            <input type="text" id="myInput1" onkeyup="myFunctionImg()" placeholder="Search for names.."
                   title="Type in a name">

            <table id="myTable1">
                <tr class="header">
                    <th style="width:20%;">Name</th>
                    <th style="width:30%;">Avatar</th>
                    <th style="width:10%;">Category</th>
                    <th style="width:20%;">Crop or Download</th>
                    <th style="width:20%;">Ask Question</th>
                </tr>

                @foreach($fileMyImage as $file)
                    <tr>
                        <td>{{$file->filename}}</td>
                        <!--<td><img src="{$file->destination_path}}"></td>-->
                        <td><img src="{{URL::asset($file->destination_path)}}" height="100" width="100"/></td>
                        <td>
                            {{$file->categories->name}}
                        </td>
                        <td>{{link_to_route('crop.image',$file->filename,[$file->id])}}</td>
                        <td>{{link_to_route('ask.image','Ask from Image',[$file->id])}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="tab-pane" id="pdf" role="tabpanel">
            <input type="text" id="myInput2" onkeyup="myFunctionPdf()" placeholder="Search for names.."
                   title="Type in a name">

            <table id="myTable2">
                <tr class="header">
                    <th style="width:60%;">Name</th>
                    <th style="width:20%;">Category</th>

                </tr>

                @foreach($filesMyPdf as $file)
                    <tr>
                        <td>{{$file->filename}}</td>
                        <td>
                            {{$file->categories->name}}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="tab-pane" id="all" role="tabpanel">
            <input type="text" id="myInput3" onkeyup="myFunction()" placeholder="Search for names.."
                   title="Type in a name">

            <table id="myTable3">
                <tr class="header">
                    <th style="width:60%;">Name</th>
                    <th style="width:60%;">Owner</th>
                    <th style="width:20%;">Category</th>
                </tr>

                @foreach($files as $file)
                    <tr>
                        <td>{{$file->filename}}</td>
                        <td>{{\App\User::findOrFail($file->user_id)->name}}
                            ({{\App\User::findOrFail($file->user_id)->email}})
                        </td>
                        <td>
                            {{$file->categories->name}}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <script>
        function myFunctionImg() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput1");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable1");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function myFunctionPdf() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput2");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable2");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function myFunction() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput3");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable3");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@stop