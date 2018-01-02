@extends('v1.administrators.layouts.app')
@section('title','Users Page')

@section('css')
<link href="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
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

@section('modal')
<div id="add" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Responsive & Scrollable</h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Some Input</h4>
                            <p>
                                <input type="text" class="col-md-12 form-control"> </p>
                            <p>
                                <input type="text" class="col-md-12 form-control"> </p>
                            <p>
                                <input type="text" class="col-md-12 form-control"> </p>
                            <p>
                                <input type="text" class="col-md-12 form-control"> </p>
                            <p>
                                <input type="text" class="col-md-12 form-control"> </p>
                            <p>
                                <input type="text" class="col-md-12 form-control"> </p>
                            <p>
                                <input type="text" class="col-md-12 form-control"> </p>
                        </div>
                        <div class="col-md-6">
                            <h4>Some More Input</h4>
                            <p>
                                <input type="text" class="col-md-12 form-control"> </p>
                            <p>
                                <input type="text" class="col-md-12 form-control"> </p>
                            <p>
                                <input type="text" class="col-md-12 form-control"> </p>
                            <p>
                                <input type="text" class="col-md-12 form-control"> </p>
                            <p>
                                <input type="text" class="col-md-12 form-control"> </p>
                            <p>
                                <input type="text" class="col-md-12 form-control"> </p>
                            <p>
                                <input type="text" class="col-md-12 form-control"> </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                <button type="button" class="btn green">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="portlet light portlet-fit bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-users"></i>Users </div>
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
                        <th> Options </th>
                        <th> # NIK </th>
                        <th> Access</th>
                        <th> Name </th>
                        <th> Email </th>
                        <th> Class </th>
                        <th> Phone </th>
                        <th> Street Address </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td align="center"><a href="javascript:;" class="btn dark btn-sm btn-outline sbold uppercase"><i class="fa fa-edit"></i> EDIT </a> </td>
                        <td> 1115162 </td>
                        <td> <a class="btn btn-xs green">Line</a> </td>
                        <td> Mochammad Rafi Al Rizkan </td>
                        <td> rafinyadi@gmail.com </td>
                        <td> 11 Rekayasa Perangkat Lunak </td>
                        <td> 089623096431 </td>
                        <td> Jalan Atlas VII no 11 </td>
                    </tr>
                    <tr>
                        <td align="center"><a href="javascript:;" class="btn dark btn-sm btn-outline sbold uppercase"><i class="fa fa-edit"></i> EDIT </a> </td>
                        <td> 1115163 </td>
                        <td> <a class="btn btn-xs blue">Facebook</a> </td>
                        <td> Arip Saepudin </td>
                        <td> arip_001@gmail.com </td>
                        <td> 11 Teknik Kendaraan Ringan </td>
                        <td> 089555348682 </td>
                        <td> Jalan Anggrek no 14 </td>
                    </tr>
                    <tr>
                        <td align="center"><a href="javascript:;" class="btn dark btn-sm btn-outline sbold uppercase"><i class="fa fa-edit"></i> EDIT </a> </td>
                        <td> 1115167 </td>
                        <td> <a class="btn btn-xs green">Line</a> </td>
                        <td> Anisa Nurul </td>
                        <td> anisa2202@yahoo.com </td>
                        <td> 10 Farmasi </td>
                        <td> 0855239858385 </td>
                        <td> Jalan Kebangsaan no 44 </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
    <!-- END SAMPLE TABLE PORTLET-->
<div class="row">
    <div class="col-md-6">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-cursor font-dark hide"></i>
                    <span class="caption-subject font-dark bold uppercase">Majors</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="easy-pie-chart">
                            <div class="number rpl" data-percent="23">
                                <span>23</span>% <canvas height="75" width="75"></canvas></div>
                            <a class="title" href="javascript:;"> Rekayasa Perangkat Lunak
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="easy-pie-chart">
                            <div class="number tkj" data-percent="25">
                                <span>25</span>% <canvas height="75" width="75"></canvas></div>
                            <a class="title" href="javascript:;"> Teknik Jaringan Komputer
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="easy-pie-chart">
                            <div class="number tsm" data-percent="44">
                                <span>44</span>% <canvas height="75" width="75"></canvas></div>
                            <a class="title" href="javascript:;"> Teknik Sepeda Motor
                            </a>
                        </div>
                    </div>
                    <div class="margin-bottom-10 visible-sm"> </div>
                    <div class="col-md-4">
                        <div class="easy-pie-chart">
                            <div class="number tkr" data-percent="77">
                                <span>77</span>% <canvas height="75" width="75"></canvas></div>
                            <a class="title" href="javascript:;"> Teknik Kendaraan Ringan
                            </a>
                        </div>
                    </div>
                    <div class="margin-bottom-10 visible-sm"> </div>
                    <div class="col-md-4">
                        <div class="easy-pie-chart">
                            <div class="number farmasi" data-percent="46">
                                <span>46</span>% <canvas height="75" width="75"></canvas></div>
                            <a class="title" href="javascript:;"> Farmasi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption ">
                    <span class="caption-subject font-dark bold uppercase">Genders</span>
                </div>
            </div>
            <div class="portlet-body">
                <div id="dashboard_amchart_4" class="CSSAnimationChart"></div>
            </div>
        </div>
    </div>
</div>
@endsection