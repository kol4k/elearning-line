@extends('v2.administrators.layouts.app')

@section('title','Exam')

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
    $(function() {
        $('#add-task').on('click', function () {
            var inputOptions = new Promise(function(resolve)
            {
                setTimeout(function() 
                {
                    resolve({
                        'a' :   'A',
                        'b' :   'B',
                        'c' :   'C',
                        'd' :   'D',
                    })
                }, 2000);
            })
            swal.setDefaults(
				{
					// input: 'text',
					confirmButtonText: 'Next &rarr;',
					showCancelButton: true,
					animation: true,
					progressSteps: ['1', '2', '3', '4', '5', '6','7']
				});
                var steps = [
                {
                    input: 'select',
                    title: 'Question 1',
                    text: 'What\'s your category selected?',
                    inputOptions:
                    {
                        @foreach($category as $v)
                        '{{ $v->id }}':  '{{ $v->name}}',
                        @endforeach
                    },
                    inputPlaceholder: 'Select Category'
                },
				{
					input: 'text',
					title: 'Question 2',
					text: 'What\'s your Question?'
				},
				{
					input: 'text',
					title: 'Answer Option',
					text: 'A'
				},
				{
					input: 'text',
					title: 'Answer Option',
					text: 'B'
				},
				{
					input: 'text',
					title: 'Answer Option',
					text: 'C'
				},
				{
					input: 'text',
					title: 'Answer Option',
					text: 'D'
				},
				{
					input: 'radio',
					title: 'Selected Answer',
					inputOptions: inputOptions
				}];
                swal.queue(steps).then(function(result)
                {
                    swal.resetDefaults();
					swal(
					{
						title: 'All done!',
						html: 'Your answer: <pre>' +
							JSON.stringify(result) +
							'</pre>',
						confirmButtonText: 'Confirm!',
						showCancelButton: true,
                        preConfirm: function(send)
                        {
                            return new Promise(function(resolve, reject)
                            {
                                setTimeout(function() {
                                    $.post("{{ route('task.store') }}", {
                                        category: result[0],
                                        question: result[1],
                                        a: result[2],
                                        b: result[3],
                                        c: result[4],
                                        d: result[5],
                                        answer: result[6],
                                    }).done(function() {
                                        swal({
                                            type: 'success',
                                            title: 'Request finished!',
                                            html: 'Data inputted.'
                                        });
                                    }).catch(swal.noop);
                                }, 2000);
                            });
                        }
					});
				}).catch(function()
				{
					swal.resetDefaults();
					swal.noop;
                });
        });
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
                <div class="panel">
                    <div class="panel-heading">
                        <h2 class="panel-title">Tasks</h2>
                        <div class="right">
                            <button type="button" class="btn btn-primary" id="add-task"><i class="fa fa-save"></i>Add New</button>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table id="tasks" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Browser</th>
                                    <th>Operating System</th>
                                    <th>Visits</th>
                                    <th>New Visits</th>
                                    <th>Bounce Rate</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Chrome</td>
                                    <td>Macintosh</td>
                                    <td>360</td>
                                    <td>82.78%</td>
                                    <td>87.77%</td>
                                </tr>
                                <tr>
                                    <td>Chrome</td>
                                    <td>Windows</td>
                                    <td>582</td>
                                    <td>87.24%</td>
                                    <td>90.12%</td>
                                </tr>
                                <tr>
                                    <td>Chrome</td>
                                    <td>Linux</td>
                                    <td>172</td>
                                    <td>45.21%</td>
                                    <td>48.81%</td>
                                </tr>
                                <tr>
                                    <td>Chrome</td>
                                    <td>iOS</td>
                                    <td>86</td>
                                    <td>35.23%</td>
                                    <td>44.21%</td>
                                </tr>
                                <tr>
                                    <td>Firefox</td>
                                    <td>Windows</td>
                                    <td>280</td>
                                    <td>63.12%</td>
                                    <td>89.34%</td>
                                </tr>
                                <tr>
                                    <td>Firefox</td>
                                    <td>Android</td>
                                    <td>236</td>
                                    <td>58.02%</td>
                                    <td>76.19%</td>
                                </tr>
                                <tr>
                                    <td>Internet Explorer</td>
                                    <td>Windows</td>
                                    <td>145</td>
                                    <td>45.23%</td>
                                    <td>94.65%</td>
                                </tr>
                                <tr>
                                    <td>Safari</td>
                                    <td>Macintosh</td>
                                    <td>103</td>
                                    <td>22.12%</td>
                                    <td>52.43%</td>
                                </tr>
                                <tr>
                                    <td>Safari</td>
                                    <td>iOS</td>
                                    <td>302</td>
                                    <td>56.98%</td>
                                    <td>45.53%</td>
                                </tr>
                                <tr>
                                    <td>Opera</td>
                                    <td>Windows</td>
                                    <td>328</td>
                                    <td>67.12%</td>
                                    <td>78.34%</td>
                                </tr>
                                <tr>
                                    <td>Opera</td>
                                    <td>Macintosh</td>
                                    <td>22</td>
                                    <td>87.21%</td>
                                    <td>79.81%</td>
                                </tr>
                                <tr>
                                    <td>Chrome</td>
                                    <td>iOS</td>
                                    <td>45</td>
                                    <td>23.21%</td>
                                    <td>34.67%</td>
                                </tr>
                                <tr>
                                    <td>Firefox</td>
                                    <td>Windows</td>
                                    <td>67</td>
                                    <td>27.11%</td>
                                    <td>78.08%</td>
                                </tr>
                                <tr>
                                    <td>Chrome</td>
                                    <td>Macintosh</td>
                                    <td>120</td>
                                    <td>80.78%</td>
                                    <td>80.77%</td>
                                </tr>
                                <tr>
                                    <td>Chrome</td>
                                    <td>Windows</td>
                                    <td>682</td>
                                    <td>89.44%</td>
                                    <td>95.32%</td>
                                </tr>
                                <tr>
                                    <td>Chrome</td>
                                    <td>Windows</td>
                                    <td>172</td>
                                    <td>43.11%</td>
                                    <td>46.89%</td>
                                </tr>
                            </tbody>
                        </table>
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
                                            <a href="#"><i class="fa fa-trash"></i></a>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h2 class="panel-title">Add Category</h2>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ Route('category.store') }}">
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
        </div>
    </div>
</div>
@endsection