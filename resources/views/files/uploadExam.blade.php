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
                        <h2>Exam Papers</h2>
                        <span class="subheading">You can Download any education material Provide By Lecturers.</span>
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
    <!-- Nav tabs -->

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
    <div class="tab-pane" id="all" role="tabpanel">
            <input type="text" id="myInput3" onkeyup="myFunction()" placeholder="Search for names.."
                   title="Type in a name">

            <table id="myTable3">
                <tr class="header">
                    <th style="width:20%;">Name</th>
                    <th style="width:20%;">Owner</th>
                    <th style="width:10%;">Year</th>
                    <th style="width:15%;">Category</th>
                    <th style="width:15%;">Subject</th>
                    <th style="width:15%;">Marking Scheme / Exam Paper</th>
                    <th style="width:20%;">Convert Option</th>
                    <th style="width:20%;">Download</th>
                </tr>

                @foreach($files as $file)
                    <tr>
                        <td>{{$file->filename}}</td>
                        <td>{{\App\User::findOrFail($file->user_id)->name}}
                            ({{\App\User::findOrFail($file->user_id)->email}})
                        </td>
                    <td>{{$file->year}}</td>
                        <td>{{\App\Categories::findOrFail($file->category_id)->name}}</td>
                        <td>{{\App\Categories::findOrFail($file->subject)->name}}</td>
                        <td>{{$file->paper_or_marking}}</td>
                        <td>
                            {{link_to_route('pdf','Convert Option',[$file->id])}}
                        </td>
                        <td>

                            @if(json_decode($file->destination_path))
                                @foreach(json_decode($file->destination_path) as $file)
                                    <a href="/storage/{{ $file->download_link or '' }}">
                                        {{ $file->original_name or '' }}
                                    </a>
                                    <br/>
                                    <div style="display: none">
                                        {{$link=$file->download_link}}
                                    </div>
                                @endforeach
                            @else
                                <a href="/storage/{{ $data->{$row->field} }}">
                                    Download
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <script>

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