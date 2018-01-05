@extends('v1.administrators.layouts.app')
@section('title','Exam Page')

@section('css')
<link href="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
@endsection

@section('js')
<script src="assets/global/plugins/moment.min.js" type="text/javascript"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script> -->
<script src="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
<script src="assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
<script src="assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
<script src="assets/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
<script src="assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
<script src="assets/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
<script src="assets/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
<script src="assets/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
<script src="assets/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
<script src="assets/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
<script src="assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
@endsection

@section('script')
<script src="assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
@endsection

@section('content')
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <span class="caption-subject font-dark bold uppercase">Completed Task</span>
        </div>
    </div>
    <div class="portlet-body">
        <div id="site_activities_loading">
            <img src="../assets/global/img/loading.gif" alt="loading"/>
        </div>
        <div id="site_activities_content" class="display-none">
            <div id="site_activities" style="height: 228px;"></div>
        </div>
    </div>
</div>
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-book"></i>Course <small class="font-yellow">Active</small> </div>
        <div class="tools">
            <a href="javascript:;" class="collapse"> </a>
            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
            <a href="javascript:;" class="reload"> </a>
            <a href="javascript:;" class="remove"> </a>
        </div>
    </div>
    <div class="portlet-body">
        <div class="table-toolbar">
            <div class="btn-group">
                <a class="btn sbold green" data-toggle="modal" href="#add"> Add New <i class="fa fa-plus"></i> </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>  </th>
                        <th> End</th>
                        <th> Name </th>
                        <th> Completed User </th>
                        <th> Options </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> CHGGKV12 </td>
                        <td> <a class="btn btn-xs yellow">10-12-2017 20:00</a> </td>
                        <td> Ujian Bahasa Indonesia </td>
                        <td> <i>234</i> Users </td>
                        <td align="center"><a href="javascript:;" class="btn dark btn-sm btn-outline sbold uppercase"><i class="fa fa-edit"></i> EDIT </a> </td>
                    </tr>
                    <tr>
                        <td> GGKVX24K </td>
                        <td> <a class="btn btn-xs yellow">02-01-2018 12:00</a> </td>
                        <td> Ulangan Harian PKN </td>
                        <td> <i>42</i> Users </td>
                        <td align="center"><a href="javascript:;" class="btn dark btn-sm btn-outline sbold uppercase"><i class="fa fa-edit"></i> EDIT </a> </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark bold uppercase">Add Category</span>
                </div>
            </div>
            <div class="portlet-body form">
                <form role="form" class="form-horizontal" method="POST" action="{{ Route('category.store') }}">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name" placeholder="Name of category.">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Description</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="description" placeholder="Description for the category.">
                            </div>
                        </div>
                    </div>
                    <div class="form-actions right">
                        <button type="reset" class="btn default">Cancel</button>
                        <button type="submit" class="btn green">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark bold uppercase">Add Task</span>
                </div>
            </div>
            <div class="portlet-body form">
                <form role="form" class="form-horizontal" method="POST" action="{{ Route('task.store') }}">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Question</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="question" placeholder="Asking something to the users.">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Answer</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="answer" placeholder="The answer is ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Category</label>
                            <div class="col-md-9">
                                <select class="form-control" name="category" id="category">
                                @foreach($category as $data)
                                    <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions right">
                        <button type="reset" class="btn default">Cancel</button>
                        <button type="submit" class="btn green">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 