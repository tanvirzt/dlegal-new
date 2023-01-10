@extends('layouts.admin_layouts.admin_layout')
@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-3">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">


                        {{-- @php

                            $civil_case = App\Models\CivilCases::where('delete_status', 0)->count();
                            $criminal_case = App\Models\CriminalCase::where('delete_status', 0)->count();
                            $quassi_case = App\Models\QuassiJudicialCase::where('delete_status', 0)->count();
                            $labour_case = App\Models\LabourCase::where('delete_status', 0)->count();
                            $supreme_case = App\Models\SupremeCourtCase::where('delete_status', 0)->count();
                            $high_case = App\Models\HighCourtCase::where('delete_status', 0)->count();

                            $total_cases = $civil_case + $criminal_case + $quassi_case + $labour_case + $supreme_case + $high_case;

                        @endphp --}}


                    </div>
                    <div class="col-sm-3">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-2 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $runningCases_no }}</h3>

                                <p>Running Cases</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <!-- ./col -->
                    <div class="col-lg-2 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$allCivil_no}}<sup style="font-size: 20px"></sup></h3>

                                <p>Civil Cases</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$allCriminal_no}}<sup style="font-size: 20px"></sup></h3>

                                <p>Criminal Cases</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>


                    <div class="col-lg-2 col-6">
                        <!-- small box -->
                        <div class="small-box bg-light">
                            <div class="inner">
                                <h3>{{ $appeal_no }}</h3>

                                <p>Appeal Cases</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-6">
                        <!-- small box -->

                        <div class="small-box bg-dark">
                            <div class="inner">
                                <h3>{{$revision_no}}</h3>

                                <p>Revision Cases</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{$disposedCase_no}}</h3>

                                <p>Disposed Cases</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <!-- ./col -->
                </div>

            </div>

        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        {{-- <input id="no_of_cases" type="hidden" value="{{$cases}}"> --}}
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Summary of monthly cases</h3>
                             
                            </div>
                            <div class="card-body">
                                <canvas id="summaryChart"
                                style="max-width: 500px;height: 370px;margin: 0px auto;"></canvas>
                            </div>
                        </div>
                    {{-- {{dd($data)}} --}}
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Cases Category</h3>
                             
                            </div>
                            <div class="card-body">
                                <div id="case-category" style="max-width: 500px;height: 370px;margin: 0px auto;"></div>
                            </div>
                        </div>
        
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Case File & Disposed</h3>

                            </div>
                            <div class="card-body">
                                <div id="case-disposed" style="max-width: 740px;height: 400px;margin: 0px auto">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3 class="card-title">Case proceeding log</h3>
                                    </div>
                                    <div class="col-sm-6 d-flex flex-row-reverse">
                                        <button id="case-but-onchange" class="btn btn-outline-dark btn-sm" value="1" >Case</button>
                                    </div>
                                </div>
                               
                             
                            </div>
                            <div class="card-body" id="civil-card">
                                <div id="case-log-civil" style="max-width: 500px;height: 393px;margin: 0px auto;"></div>
                            </div>


                            <div class="card-body" id="civil-criminal" style="display: none">
                                <div id="case-log-criminal" style="max-width: 500px;height: 393px;margin: 0px auto;"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Income & Expenses</h3>
                            </div>
                            <div class="card-body">
                                <div id="income-expense" style="max-width: 740px;height: 400px;margin: 0px auto">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Client Chart</h3>
                            </div>
                            <div class="card-body">
                                <div id="client-chart" style="max-width: 500px;height: 400px;margin: 0px auto;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

                <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                    {{ Session::get('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"> Task List </h3>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table style="font-size:12px" id="data_table" class="table dataTable no-footer dtr-inline">
                                        <thead>
                                            <tr>
                                                <th class=" text-nowrap">Status</th>
                                                <th class="text-center text-nowrap">Title</th>
                                                <th class="text-center text-nowrap">Date</th>
                                                <th class="text-center text-nowrap">Priority</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tasks as $datum)
                                                <tr>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-2">
                                                                <i class="fa fa-circle" style="color:

                                                                {{$datum->current_status == 'To Do' ? 'grey' : ''}}
                                                                {{$datum->current_status == 'In Progress' ? 'yellow' : ''}}
                                                                {{$datum->current_status == 'Due' ? 'red' : ''}}
                                                                {{$datum->current_status == 'Complete' ? 'green' : ''}}

                                                                "></i>
                                                            </div>
                                                            <div class="col-10">
                                                                <form action="{{ route('task.change.status', $datum->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <select class="select2 form-control-sm"
                                                                        name="current_status" onchange="this.form.submit()">
                                                                        <option value="In Progress"
                                                                            {{ $datum->current_status == 'In Progress' ? 'selected' : false }}>
                                                                            In Progress</option>
                                                                        <option value="To Do"
                                                                            {{ $datum->current_status == 'To Do' ? 'selected' : false }}>
                                                                            To Do</option>
                                                                        <option value="Due"
                                                                            {{ $datum->current_status == 'Due' ? 'selected' : false }}>
                                                                            Due</option>
                                                                        <option value="Complete"
                                                                            {{ $datum->current_status == 'Complete' ? 'selected' : false }}>
                                                                            Complete</option>
                                                                    </select>
                                                                </form>
                                                            </div>
                                                        </div>


                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{route('task.show',$datum->id)}}" class="text-dark text-underline"><u>{{ $datum->title }}</u></a>
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $datum->date }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $datum->priority }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
                <!-- /.content -->
    </div>
@endsection


<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

<script src="https://code.jscharting.com/latest/jscharting.js"></script>
<script type="text/javascript" src="https://code.jscharting.com/latest/modules/types.js"></script>

<script>
   $(document).ready(function(){

    var ctx = document.getElementById('summaryChart').getContext('2d');
     var chart = new Chart(ctx, {
	   type: 'bar',
	   data: {
	    labels: ["Jan", "Feb", "Mar", "Apr", "May","June","July","Aug","Sept","Oct","Nov","Des"],
        datasets: [{
			label: "Cases",
			backgroundColor: 'green',
			borderColor: 'royalblue',
			data: @json($cases)
		}]
	},
    options: {
        layout: {
        padding: 8,
        },
            legend: {
                position: 'bottom',
            },
            title: {
                display: false,
                text: 'Precipitation in Toronto'
            },
            scales: {
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Total No. of Cases'
                    }
                }],
                xAxes: [{
                    scaleLabel: {
                        display: false,
                        labelString: 'Month of the Year'
                    }
                }]
            }
        }
    });

    JSC.chart('case-category', {
        debug: true,
        defaultSeries: { type: 'pieDonut', shape_center: '50%,50%' },
        // title: {
        //   label: {
        //     text: 'All Cases',
        //     style_fontSize: 16
        //   },
        //   position: 'center'
        // },
        defaultPoint: {
          tooltip: '<b>%name</b><br>total_cases: <b>{%yValue}</b>'
        },
        legend: { template: '{%value} %icon %name', position: 'right' },
        series: [
          {
            name: 'Type',
            points: [
              { x: 'Civil', y: {{$allCivil_no}}, legendEntry: { sortOrder: 1 } },
              { x: 'Criminal', y: {{$allCriminal_no}}, legendEntry: { sortOrder: 3, lineAbove: true } }, 
            ],
            shape: { innerSize: '0%', size: '40%' },
            defaultPoint_label: {
              text: '<b>%name</b>',
              placement: 'inside'
            },
            palette: ['#66bb6a', '#ffca28', '#ef5350']
          },
          {
            name: 'Category',
            points: @json($Civil_Criminal_Case_type_Array),
            defaultPoint_tooltip: '<b>%year %name</b><br>total_cases: <b>{%yValue}</b>',
            shape: { innerSize: '55%', size: '80%' },
            palette: JSC.colorToPalette('#66bb6a', { lightness: 0.4 }, 4, 0).concat(
              JSC.colorToPalette('#ffca28', { lightness: 0.4 }, 4, 0),
              JSC.colorToPalette('#ef5350', { lightness: 0.4 }, 4, 0)
            )
          }
        ]
    });



    JSC.chart('case-disposed', { 
            debug: true, 
            defaultSeries_type: 'column', 
            yAxis: { label_text: 'No. of Cases' }, 
            xAxis: { 
                label_text: 'Month', 
                categories: ["Jan", "Feb", "Mar", "Apr", "May","June","July","Aug","Sept","Oct","Nov","Des"],
            }, 
            legend: { template: '{%value} %icon %name', position: 'top' },
            series: [ 
                { 
                name: 'Case Filling', 
                id: 's1', 
                points: @json($caseFilling) 
                }, 
                { 
                name: 'Case Disposed', 
                points: @json($caseDisposed) 
                }
            ] 
    });

    JSC.chart('case-log-civil',{
     debug: true,
        defaultSeries: { type: 'pieDonut', shape_center: '50%,50%' },
        // title: {
        //   label: {
        //     text: 'All Cases',
        //     style_fontSize: 16
        //   },
        //   position: 'center'
        // },
        defaultPoint: {
          tooltip: '<b>%name</b><br>total_cases: <b>{%yValue}</b>'
        },
        legend: { template: '{%value} %icon %name', position: 'right' },
        series: [
          {
            name: 'Type',
            points: [
              { x: 'Civil', y:  {{$allCivil_no}}, legendEntry: { sortOrder: 1 } },
            ],
            shape: { innerSize: '0%', size: '40%' },
            defaultPoint_label: {
              text: '<b>%name</b>',
              placement: 'inside'
            },
            palette: ['#179199']
          },
          {
            name: 'Category',
            points:@json($caselogCountArray_civil),
            defaultPoint_tooltip: '<b>%year %name</b><br>total_cases: <b>{%yValue}</b>',
            shape: { innerSize: '55%', size: '80%' },
            palette: JSC.colorToPalette('#179199', { lightness: 0.4 }, 4, 0)
          }
        ]
    });

   

    $('#case-but-onchange').on('click', function(){
      if ($(this).val() == "0") {
        $(this).val("1")
        $('#civil-criminal').hide();
        $('#civil-card').show();
     
      }else{
        $(this).val("0")
        $('#civil-card').hide();
        $('#civil-criminal').show();
        JSC.chart('case-log-criminal',{
            debug: false,
                defaultSeries: { type: 'pieDonut', shape_center: '50%,50%' },
                // title: {
                //   label: {
                //     text: 'All Cases',
                //     style_fontSize: 16
                //   },
                //   position: 'center'
                // },
                defaultPoint: {
                tooltip: '<b>%name</b><br>total_cases: <b>{%yValue}</b>'
                },
                legend: { template: '{%value} %icon %name', position: 'right' },
                series: [
                {
                    points: [
                     { x: 'Criminal', y: {{$allCriminal_no}}, legendEntry: { sortOrder: 1 } },
                    ],
                    shape: { innerSize: '0%', size: '45%' },
                    defaultPoint_label: {
                    text: '<b>%name</b>',
                    placement: 'inside'
                    },
                    palette: ['#b214de']
                },
                {
                    points: @json($caselogCountArray_Criminal),
                    defaultPoint_tooltip: '<b>%year %name</b><br>total_cases: <b>{%yValue}</b>',
                    shape: { innerSize: '55%', size: '90%' },
                    palette: JSC.colorToPalette('#b214de', { lightness: 0.4 }, 4, 0)
                }
                ]
        });
      }
    })

    JSC.chart('income-expense', { 
        debug: true, 
        type: 'line', 
        legend: { 
            template: '%icon %name', 
            position: 'inside top left'
        }, 
        defaultPoint_marker_type: 'none', 
        xAxis_crosshair_enabled: true, 
        yAxis_formatString: 'c', 
        series: [ 
            { 
                name: 'Income', 
                points: [ 
                    [new Date(2023, 1, 1), 28.15], 
                    [new Date(2023, 1, 2), 28.2], 
                    [new Date(2023, 1, 3), 28.37], 
                    [new Date(2023, 1, 4), 27.59], 
                    [new Date(2023, 1, 5), 27.76], 
                    [new Date(2023, 1, 8), 27.47], 
                    [new Date(2023, 1, 9), 27.75], 
                    [new Date(2023, 1, 10), 27.73], 
                    [new Date(2023, 1, 11), 27.86], 
                    [new Date(2023, 1, 12), 27.68], 
                    [new Date(2023, 1, 16), 28.22], 
                    [new Date(2023, 1, 17), 28.46], 
                    [new Date(2023, 1, 18), 28.84], 
                    [new Date(2023, 1, 19), 28.64], 
                    [new Date(2023, 1, 22), 28.6], 
                    [new Date(2023, 1, 23), 28.2], 
                    [new Date(2023, 1, 24), 28.5], 
                    [new Date(2023, 1, 25), 28.47], 
                    [new Date(2023, 1, 26), 28.54], 
                    [new Date(2023, 2, 1), 28.89], 
                    [new Date(2023, 2, 2), 28.33], 
                    [new Date(2023, 2, 3), 28.33], 
                    [new Date(2023, 2, 4), 28.5], 
                    [new Date(2023, 2, 5), 28.46], 
                    [new Date(2023, 2, 8), 28.5], 
                    [new Date(2023, 2, 9), 28.67], 
                    [new Date(2023, 2, 10), 28.84], 
                    [new Date(2023, 2, 11), 29.05], 
                    [new Date(2023, 2, 12), 29.14], 
                    [new Date(2023, 2, 15), 29.16], 
                    [new Date(2023, 2, 16), 29.24], 
                    [new Date(2023, 2, 17), 29.5], 
                    [new Date(2023, 2, 18), 29.48], 
                    [new Date(2023, 2, 19), 29.46], 
                    [new Date(2023, 2, 22), 29.47], 
                    [new Date(2023, 2, 23), 29.75], 
                    [new Date(2023, 2, 24), 29.52], 
                    [new Date(2023, 2, 25), 29.88], 
                    [new Date(2023, 2, 26), 29.53], 
                    [new Date(2023, 2, 29), 29.46], 
                    [new Date(2023, 2, 30), 29.64], 
                    [new Date(2023, 2, 31), 29.16], 
                    [new Date(2023, 3, 1), 29.03], 
                    [new Date(2023, 3, 5), 29.14], 
                    [new Date(2023, 3, 6), 29.19], 
                    [new Date(2023, 3, 7), 29.22], 
                    [new Date(2023, 3, 8), 29.79], 
                    [new Date(2023, 3, 9), 30.2], 
                    [new Date(2023, 3, 12), 30.18], 
                    [new Date(2023, 3, 13), 30.31], 
                    [new Date(2023, 3, 14), 30.68], 
                    [new Date(2023, 3, 15), 30.73], 
                    [new Date(2023, 3, 16), 30.53], 
                    [new Date(2023, 3, 19), 30.9], 
                    [new Date(2023, 3, 20), 31.22], 
                    [new Date(2023, 3, 21), 31.19], 
                    [new Date(2023, 3, 22), 31.25], 
                    [new Date(2023, 3, 23), 30.82], 
                    [new Date(2023, 3, 26), 30.97], 
                    [new Date(2023, 3, 27), 30.71], 
                    [new Date(2023, 3, 28), 30.77], 
                    [new Date(2023, 3, 29), 30.86], 
                    [new Date(2023, 3, 30), 30.4], 
                    [new Date(2023, 4, 3), 30.72], 
                    [new Date(2023, 4, 4), 29.99], 
                    [new Date(2023, 4, 5), 29.72], 
                    [new Date(2023, 4, 6), 28.85], 
                    [new Date(2023, 4, 7), 28.08], 
                    [new Date(2023, 4, 10), 28.81], 
                    [new Date(2023, 4, 11), 28.75], 
                    [new Date(2023, 4, 12), 29.31], 
                    [new Date(2023, 4, 13), 29.11], 
                    [new Date(2023, 4, 14), 28.8], 
                    [new Date(2023, 4, 17), 28.81], 
                    [new Date(2023, 4, 18), 28.6], 
                    [new Date(2023, 4, 19), 28.24], 
                    [new Date(2023, 4, 20), 27.11], 
                    [new Date(2023, 4, 21), 26.84], 
                    [new Date(2023, 4, 24), 26.27] 
                ] 
            } ,
            { 
                name: 'Expense', 
                points: [ 
                    [new Date(2023, 1, 1), 25.95], 
                    [new Date(2023, 1, 2), 25.25], 
                    [new Date(2023, 1, 3), 25.57], 
                    [new Date(2023, 1, 4), 24.99], 
                    [new Date(2023, 1, 5), 25.76], 
                    [new Date(2023, 1, 8), 24.97], 
                    [new Date(2023, 1, 9), 24.75], 
                    [new Date(2023, 1, 10), 24.23], 
                    [new Date(2023, 1, 11), 24.26], 
                    [new Date(2023, 1, 12), 24.28], 
                    [new Date(2023, 1, 16), 25.22], 
                    [new Date(2023, 1, 17), 25.46], 
                    [new Date(2023, 1, 18), 25.84], 
                    [new Date(2023, 1, 19), 25.64], 
                    [new Date(2023, 1, 22), 25.6], 
                    [new Date(2023, 1, 23), 25.2], 
                    [new Date(2023, 1, 24), 25.5], 
                    [new Date(2023, 1, 25), 25.47], 
                    [new Date(2023, 1, 26), 25.54], 
                    [new Date(2023, 2, 1), 25.89], 
                    [new Date(2023, 2, 2), 25.33], 
                    [new Date(2023, 2, 3), 25.33], 
                    [new Date(2023, 2, 4), 25.5], 
                    [new Date(2023, 2, 5), 25.46], 
                    [new Date(2023, 2, 8), 25.5], 
                    [new Date(2023, 2, 9), 25.67], 
                    [new Date(2023, 2, 10), 25.84], 
                    [new Date(2023, 2, 11), 25.05], 
                    [new Date(2023, 2, 12), 25.14], 
                    [new Date(2023, 2, 15), 25.16], 
                    [new Date(2023, 2, 16), 25.24], 
                    [new Date(2023, 2, 17), 25.5], 
                    [new Date(2023, 2, 18), 25.48], 
                    [new Date(2023, 2, 19), 25.46], 
                    [new Date(2023, 2, 22), 25.47], 
                    [new Date(2023, 2, 23), 25.75], 
                    [new Date(2023, 2, 24), 25.52], 
                    [new Date(2023, 2, 25), 25.88], 
                    [new Date(2023, 2, 26), 25.53], 
                    [new Date(2023, 2, 29), 25.46], 
                    [new Date(2023, 2, 30), 25.64], 
                    [new Date(2023, 2, 31), 25.16], 
                    [new Date(2023, 3, 1), 25.03], 
                    [new Date(2023, 3, 5), 25.14], 
                    [new Date(2023, 3, 6), 25.19], 
                    [new Date(2023, 3, 7), 25.22], 
                    [new Date(2023, 3, 8), 25.59], 
                    [new Date(2023, 3, 9), 23.29], 
                    [new Date(2023, 3, 12), 23.78], 
                    [new Date(2023, 3, 13), 23.71], 
                    [new Date(2023, 3, 14), 23.78], 
                    [new Date(2023, 3, 15), 23.73], 
                    [new Date(2023, 3, 16), 23.63], 
                    [new Date(2023, 3, 19), 23.29], 
                    [new Date(2023, 3, 20), 26.52], 
                    [new Date(2023, 3, 21), 26.59], 
                    [new Date(2023, 3, 22), 26.75], 
                    [new Date(2023, 3, 23), 23.72], 
                    [new Date(2023, 3, 26), 23.57], 
                    [new Date(2023, 3, 27), 23.71], 
                    [new Date(2023, 3, 28), 23.77], 
                    [new Date(2023, 3, 29), 23.76], 
                    [new Date(2023, 3, 30), 23.54], 
                    [new Date(2023, 4, 3), 23.82], 
                    [new Date(2023, 4, 4), 24.29], 
                    [new Date(2023, 4, 5), 24.72], 
                    [new Date(2023, 4, 6), 28.55], 
                    [new Date(2023, 4, 7), 28.58], 
                    [new Date(2023, 4, 10), 28.71], 
                    [new Date(2023, 4, 11), 28.95], 
                    [new Date(2023, 4, 12), 24.71], 
                    [new Date(2023, 4, 13), 24.41], 
                    [new Date(2023, 4, 14), 28.88], 
                    [new Date(2023, 4, 17), 28.61], 
                    [new Date(2023, 4, 18), 28.86], 
                    [new Date(2023, 4, 19), 28.84], 
                    [new Date(2023, 4, 20), 24.81], 
                    [new Date(2023, 4, 21), 26.34], 
                    [new Date(2023, 4, 24), 26.97] 
                ] 
            } 
        ] 
    }); 


    JSC.chart('client-chart',{
            debug: false,
                defaultSeries: { type: 'pieDonut', shape_center: '50%,50%' },
                // title: {
                //   label: {
                //     text: 'All Cases',
                //     style_fontSize: 16
                //   },
                //   position: 'center'
                // },
                defaultPoint: {
                tooltip: '<b>%name</b><br>total_cases: <b>{%yValue}</b>'
                },
                legend: { template: '{%value} %icon %name', position: 'right' },
                series: [
                {
                    points: [
                     { x: 'Client', y: 120, legendEntry: { sortOrder: 1 } },
                    ],
                    shape: { innerSize: '0%', size: '45%' },
                    defaultPoint_label: {
                    text: '<b>%name</b>',
                    placement: 'inside'
                    },
                    palette: ['orange']
                },
                {
                    points: [
                    { x: 'Category ', y: 15, legendEntry_sortOrder: 2, attributes_year: 'Client' },
                    { x: 'Sub-Category', y: 5 , legendEntry_sortOrder: 2, attributes_year: 'Client' },
                    ],
                    defaultPoint_tooltip: '<b>%year %name</b><br>total_cases: <b>{%yValue}</b>',
                    shape: { innerSize: '55%', size: '90%' },
                    palette: JSC.colorToPalette('orange', { lightness: 0.4 }, 4, 0)
                }
                ]
        });
});    
</script>

