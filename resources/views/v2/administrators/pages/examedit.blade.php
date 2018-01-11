@extends('v2.administrators.layouts.app')

@section('title','Category')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/vendor/datatables/css-main/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/datatables/css-bootstrap/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/datatables-tabletools/css/dataTables.tableTools.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert2/sweetalert2.css') }}">
@endsection

@section('js')
<script src="{{ asset('assets/vendor/chart-js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables/js-main/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables/js-bootstrap/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables-colreorder/dataTables.colReorder.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables-tabletools/js/dataTables.tableTools.js') }}"></script>
<script src="{{ asset('assets/vendor/sweetalert2/sweetalert2.js') }}"></script>
<script>
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
        myTable('#tasks');
        myTable('#categories')
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
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h2 class="panel-title">Edit Category</h2>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="http://localhost:8000/api/v1/category">
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-3 control-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="description" id="description" rows="5" cols="30" placeholder="Message"></textarea>
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
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h2 class="panel-title">Categories</h2>
                    </div>
                    <div class="panel-body">
                        <table id="categories" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($category as $v)
                                <tr>
                                    <td>{{ $v->name }}</td>
                                    <td>{{ $v->description }}</td>
                                    <td>
                                        <span class="actions">
                                            <a href="#"><i class="fa fa-eye"></i></a>
                                            <a href="#"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ Route('category.destroy',$v->id) }}"><i class="fa fa-trash"></i></a>
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