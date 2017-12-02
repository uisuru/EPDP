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
            <ui>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ui>
            <br>
        @endif
    </div>
    <br>
    <div class="row">
        {!! Form::open(array('url'=> '/handleUpload','files'=>true)) !!}
        {!! Form::file('file') !!}
        {!! Form::token() !!}
        {!! Form::submit('Upload') !!}
        {!! Form::close() !!}
    </div>
    <br>
    <style>
        * {
            box-sizing: border-box;
        }

        #myInput {
            background-image: url('/img/searchicon.png');
            background-position: 10px 10px;
            background-repeat: no-repeat;
            width: 100%;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
        }

        #myTable {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ddd;
            font-size: 18px;
        }

        #myTable th, #myTable td {
            text-align: left;
            padding: 12px;
        }

        #myTable tr {
            border-bottom: 1px solid #ddd;
        }

        #myTable tr.header, #myTable tr:hover {
            background-color: #f1f1f1;
        }
    </style>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

    <table id="myTable">
        <tr class="header">
            <th style="width:60%;">Name</th>
            <th style="width:40%;">Delete</th>
        </tr>

        @foreach($files as $file)
            <tr>
                <td>{{$file->filename}}</td>
                <td>{{link_to_route('deleteFile','Delete',[$file->id])}}</td>
            </tr>
        @endforeach
    </table>

    <script>
        function myFunction() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
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