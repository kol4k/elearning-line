@extends('v2.administrators.layouts.app')

@section('title','Task')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/vendor/datatables/css-main/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/datatables/css-bootstrap/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/datatables-tabletools/css/dataTables.tableTools.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert2/sweetalert2.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/summernote/summernote.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/select2/css/select2.min.css') }}">
@endsection

@section('js')
<script src="{{ asset('assets/vendor/chart-js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables/js-main/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables/js-bootstrap/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables-colreorder/dataTables.colReorder.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables-tabletools/js/dataTables.ta bleTools.js') }}"></script>
<script src="{{ asset('assets/vendor/sweetalert2/sweetalert2.js') }}"></script>
<script src="{{ asset('assets/vendor/summernote/summernote.min.js') }}"></script>
<script src="{{ asset('assets/vendor/select2/js/select2.min.js') }}"></script>
<script>
    function edit(n) {
        url = 'http://localhost:8000/api/v1/tasks/';
        $.get(url + n, function(data) {
            // $('#e').html('<center><img src="{{ asset("assets/img/loading.svg") }}"></center>').show();
        }).done(function (data) {
            $('#question').summernote('code', data.question); // textarea
            $('#a').val(data.a);
            $('#b').val(data.b);
            $('#c').val(data.c);
            $('#d').val(data.d);
            $('#answer').val(data.answer);
            $('#formedit').prop('action', 'http://localhost:8000/tasks/' + n);
            console.log(url);
        });
    }
    function myTable($v) {
        $($v).dataTable(
            {
                sDom: "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
            "lengthMenu": [3, 10, 15, 30, 50],
            "pageLength": 3
            }
        );
    }
    $(function()
    {
        $('.summernote').summernote(
        {
            height: 300,
            focus: true,
            onpaste: function()
            {
                alert('You have pasted something to the editor');
            }
        });
        myTable('#tasks');
        myTable('#categories')
        $('#select-placeholder-single').select2(
        {
            placeholder: 'Select a Category',
            allowClear: true
        });
    });
</script>
@endsection

@section('content')
<div class="main-content">
    <div class="content-heading clearfix">
        <div class="heading-left">
            <h1 class="page-title">@yield('title') Page</h1>
            <p class="page-subtitle">This page for @yield('title') edit.</p>
        </div>
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#">Pages</a></li>
            <li class="active">@yield('title')</li>
        </ul>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            @if(Session::has('update') == 'success')
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="fa fa-check-circle"></i> Your task have been succesfully saved.
                </div>
            @endif
                <div class="panel" id="edit">
                    <div class="panel-heading">
                        <h2 class="panel-title">Edit Task</h2>
                    </div>
                    <div class="panel-body" id="e">
                        <form class="form-horizontal" id="formedit" role="form" method="POST" action="{{ Route('tasks.update', $data->id ) }}" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                            <div class="form-group">
                                <label for="description" class="col-sm-3 control-label">Question</label>
                                <div class="col-sm-9" id="q">
                                    <textarea class="form-control summernote" name="question" id="question" rows="5" cols="30" placeholder="Message">{{ $data->question }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">A</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" name="a" id="a" value="{{ $data->a }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">B</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" name="b" id="b" value="{{ $data->b }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">C</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" name="c" id="c" value="{{ $data->c }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">D</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" name="d" id="d" value="{{ $data->d }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="category" class="col-sm-3 control-label">Category</label>
                                <div class="col-sm-9">
                                <select id="select-placeholder-single" name="category" style="width: 100%;">
                                    <option></option>
                                    @foreach($category as $v)
                                    <option value="{{ $v->id }}"@if($v->id == $data->category) selected="selected"@endif>{{ $v->name }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="answer" class="col-sm-3 control-label">Answer</label>
                                <div class="col-sm-9">
                                <label class="fancy-radio custom-color-blue">
                                    <input name="answer" value="a" type="radio"@if($data->answer == 'a') checked @endif>
                                    <span><i></i>A</span>
                                </label>
                                <label class="fancy-radio custom-color-blue">
                                    <input name="answer" value="b" type="radio"@if($data->answer == 'b') checked @endif>
                                    <span><i></i>B</span>
                                </label>
                                <label class="fancy-radio custom-color-blue">
                                    <input name="answer" value="c" type="radio"@if($data->answer == 'c') checked @endif>
                                    <span><i></i>C</span>
                                </label>
                                <label class="fancy-radio custom-color-blue">
                                    <input name="answer" value="d" type="radio"@if($data->answer == 'd') checked @endif>
                                    <span><i></i>D</span>
                                </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h2 class="panel-title">Tasks</h2>
                    </div>
                    <div class="panel-body">
                        <table id="categories" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($task as $v)
                                <tr>
                                    <td>{!! $v->question !!}</td>
                                    <td>{{ $v->answer }}</td>
                                    <td>
                                        <span class="actions">
                                            <a href="#edit" onclick="edit('{{ $v->id }}')"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ Route('tasks.destroy',$v->id) }}"><i class="fa fa-trash"></i></a>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection