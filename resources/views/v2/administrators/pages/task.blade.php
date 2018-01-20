@extends('v2.administrators.layouts.app')

@section('title','Tasks')

@section('css')
<link rel="stylesheet" href="assets/vendor/datatables/css-main/jquery.dataTables.min.css">
<link rel="stylesheet" href="assets/vendor/datatables/css-bootstrap/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="assets/vendor/datatables-tabletools/css/dataTables.tableTools.css">
<link rel="stylesheet" href="assets/vendor/sweetalert2/sweetalert2.css">
@endsection

@section('js')
<script src="assets/vendor/chart-js/Chart.min.js"></script>
<script src="assets/vendor/datatables/js-main/jquery.dataTables.min.js"></script>
<script src="assets/vendor/datatables/js-bootstrap/dataTables.bootstrap.min.js"></script>
<script src="assets/vendor/datatables-colreorder/dataTables.colReorder.js"></script>
<script src="assets/vendor/datatables-tabletools/js/dataTables.tableTools.js"></script>
<script src="assets/vendor/sweetalert2/sweetalert2.js"></script>
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
<script>
		$(function()
		{
			// general config and options
			Chart.defaults.global.defaultFontColor = '#a0aeba';
			var chartLabels = ['MAT', 'SBY', 'PAI', 'PKN', 'PRD', 'PBO', 'PWD'];
            var Month = ['JAN','FEB','MAR','APR','MEI','JUNI','JULI','AUG','SEP','OKT','NOV','DEC'];
			var chartComplete = [123, 129, 124, 130, 132, 139, 140,144,140,132,140,142];
			var chartData = [123, 129, 124, 130, 132, 139, 140];
			var chartData2 = [125, 127, 123, 132, 129, 138, 144];
			var chartData3 = [-90, -70, -40, 35, 50, 70, 90];
			var chartData4 = [-20, -50, -20, 15, 30, 50, 70];
			var scalesOptions = {
				xAxes: [
				{
					gridLines:
					{
						display: false
					}
				}],
				yAxes: [
				{
					gridLines:
					{
						color: '#eff3f6',
						drawBorder: false,
					},
				}]
			};
            
			// polar chart
			var ctxPolarChart = document.getElementById("polar-chart").getContext("2d");
			var polarChart = Chart.PolarArea(ctxPolarChart,
			{
				data:
				{
					labels: chartLabels,
					datasets: [
					{
						data: [10, 20, 40, 60, 80, 90, 50],
						backgroundColor: [
							'rgba(73,143,226,.5)',
							'rgba(255,68,2,.5)',
							'rgba(124,172,37,.5)',
							'rgba(171,125,246,.5)',
							'rgba(243,187,36,.5)',
							'rgba(32,178,170,.5)',
							'rgba(29,187,142,.5)',
						],
					}]
				},
				options:
				{
					responsive: true,
					legend:
					{
						position: 'right'
					},
					scale:
					{
						ticks:
						{
							beginAtZero: true
						},
						reverse: false
					},
				}
			});
            // area chart
			var ctxAreaChart = document.getElementById("area-chart").getContext("2d");
			var areaChart = new Chart(ctxAreaChart,
			{
				type: 'line',
				data:
				{
					labels: Month,
					datasets: [
					{
						data: chartComplete,
						label: 'Data 1',
						backgroundColor: 'rgba(0, 183, 253, .25)',
						borderColor: 'rgb(0, 183, 253)',
						borderWidth: 2,
					}, ],
				},
				options:
				{
					responsive: true,
					scales: scalesOptions,
					elements:
					{
						point:
						{
							radius: 2,
						},
					},
					legend:
					{
						position: 'right'
					}
				}
			});
			$('#straightArea').on('change', function()
			{
				areaChart.options.elements.line.tension = $(this).is(':checked') ? 0.000001 : 0.4;
				areaChart.update();
			});
			$('#addRemoveAreaDataset').on('change', function()
			{
				var newDataset = {
					data: chartData,
					label: 'Data 2',
					backgroundColor: 'rgba(248,155,2,0.50)',
					borderColor: 'rgb(248,155,2)',
					borderWidth: 2,
				};
				if ($(this).is(':checked'))
				{
					areaChart.data.datasets.push(newDataset);
				}
				else
				{
					areaChart.data.datasets.pop();
				}
				areaChart.options.scales.yAxes.stacked = true;
				areaChart.update();
			});
		});
		</script>
@endsection

@section('content')
<div class="main-content">
    <div class="content-heading clearfix">
        <div class="heading-left">
            <h1 class="page-title">@yield('title') Page</h1>
            <p class="page-subtitle">This page for exam management.</p>
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
                        <h2 class="panel-title">Completed Task</h2>
                    </div>
                    <div class="panel-body">
                        <canvas id="area-chart" height="150"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h2 class="panel-title">Radar Chart</h2>
                    </div>
                    <div class="panel-body">
                        <canvas id="polar-chart" height="150"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
            @if(Session::has('delete') == 'success')
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="fa fa-check-circle"></i> Your data have been succesfully delete.
                </div>
            @endif
            @if(Session::has('update') == 'success')
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="fa fa-check-circle"></i> Your data have been succesfully saved.
                </div>
            @endif
                <div class="panel">
                    <div class="panel-heading">
                        <h2 class="panel-title">Tasks</h2>
                        <div class="right">
                            <button type="button" class="btn btn-primary" onclick="window.location.href='{{ Route('tasks.create') }}';"><i class="fa fa-save"></i>Add New</button>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table id="tasks" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Question</th>
                                    <th>A</th>
                                    <th>B</th>
                                    <th>C</th>
                                    <th>D</th>
                                    <th>Answer</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($task as $v)
                                <tr>
                                    <td>{{ $v->id }}</td>
                                    <td>{!! $v->question !!}</td>
                                    <td>{{ $v->a }}</td>
                                    <td>{{ $v->b }}</td>
                                    <td>{{ $v->c }}</td>
                                    <td>{{ $v->d }}</td>
                                    <td>{{ $v->answer }}</td>
                                    <td>
                                        <span class="actions">
                                            <a href="{{ Route('tasks.edit', $v->id) }}"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ Route('tasks.destroy', $v->id) }}"><i class="fa fa-trash"></i></a>
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