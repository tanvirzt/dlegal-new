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
                    <div class="col-sm-3" >
                        <!-- small box -->
                        <div class="small-box bg-info" style="background-color:#fff !important; color: #ccc;   ">
                            <a target="_blank" href="all-cases" class="small-box-footer" style="background:none;">
                                <div class="inner" style="padding: 30px;">
                                    <img src="{{ asset('login_assets/img/clients.png') }}">
                                    <h3 style="margin-top: 10px;" >{{ $runningCases_no }}</h3>
                                    <p>Clients</p>
                                </div>
                            </a>
                            
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <!-- small box -->
                        <div class="small-box bg-info" style="background-color:#fff !important; color: #ccc;   ">
                            <a target="_blank" href="all-cases" class="small-box-footer" style="background:none;">
                                <div class="inner" style="padding: 24px;">
                                    <img src="{{ asset('login_assets/img/hand-lock.png') }}">
                                    <h3 style="margin-top: 10px;" >{{ $runningCases_no }}</h3>
                                    <p>Number of Cases</p>
                                </div>
                            </a>
                            
                        </div>
                    </div><div class="col-sm-3">
                        <!-- small box -->
                        <div class="small-box bg-info" style="background-color:#fff !important; color: #ccc;   ">
                            <a target="_blank" href="all-cases" class="small-box-footer" style="background:none;">
                                <div class="inner" style="padding: 23px;">
                                    <img src="{{ asset('login_assets/img/criminal-cases.png') }}">
                                    <h3 style="margin-top: 10px;" >{{$allCriminal_no}}</h3>
                                    <p>Criminal Cases</p>
                                </div>
                            </a>
                            
                        </div>
                    </div><div class="col-sm-3">
                        <!-- small box -->
                        <div class="small-box bg-info" style="background-color:#fff !important; color: #ccc;   ">
                            <a target="_blank" href="all-cases" class="small-box-footer" style="background:none;">
                                <div class="inner" style="padding: 23px;">
                                    <img src="{{ asset('login_assets/img/ask.png') }}">
                                    <h3 style="margin-top: 5px;" >{{$allCivil_no}}</h3>
                                    <p>Civil Cases</p>
                                </div>
                            </a>
                            
                        </div>
                    </div>



                    <!-- ./col -->
                </div>

            </div>
            <div style="height: 20px;"></div>
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

                {{-- {{dd($lExpes)}} --}}
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


    var IncomeData = [];
    @json($lInco).map((item)=>{
        IncomeData.push([new Date(item.ledger_date),parseInt(item.income_paid_amount)])
    })
    var ExpenseData = [];
    @json($lExpes).map((item)=>{
        ExpenseData.push([new Date(item.ledger_date),parseInt(item.expense_paid_amount)])
    })
    console.log("IncomeData",IncomeData)

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
                points:IncomeData
            } ,
            { 
                name: 'Expense', 
                points:ExpenseData
                //  [ 
                //     [new Date(2023, 1, 1), 25095], 
                //     // [new Date(2023, 1, 2), 25025], 
                //     // [new Date(2023, 1, 3), 25057], 
                //     // [new Date(2023, 1, 4), 24099], 
                //     // [new Date(2023, 1, 5), 25076], 
                //     // [new Date(2023, 1, 8), 24097], 
                //     // [new Date(2023, 1, 9), 24075], 
                //     // [new Date(2023, 1, 10), 24023], 
                //     // [new Date(2023, 1, 11), 24026], 
                //     // [new Date(2023, 1, 12), 24028], 
                //     // [new Date(2023, 1, 16), 25022], 
                //     // [new Date(2023, 1, 17), 25046], 
                //     // [new Date(2023, 1, 18), 25084], 
                //     // [new Date(2023, 1, 19), 25064], 
                //     // [new Date(2023, 1, 22), 2506], 
                //     // [new Date(2023, 1, 23), 2502], 
                //     // [new Date(2023, 1, 24), 2505], 
                //     // [new Date(2023, 1, 25), 25047], 
                //     // [new Date(2023, 1, 26), 25054], 
                //     [new Date(2023, 2, 1), 25089], 
                //     // [new Date(2023, 2, 2), 25033], 
                //     // [new Date(2023, 2, 3), 25033], 
                //     // [new Date(2023, 2, 4), 2505], 
                //     // [new Date(2023, 2, 5), 25046], 
                //     // [new Date(2023, 2, 8), 2505], 
                //     // [new Date(2023, 2, 9), 25067], 
                //     // [new Date(2023, 2, 10), 25084], 
                //     // [new Date(2023, 2, 11), 25005], 
                //     // [new Date(2023, 2, 12), 25014], 
                //     // [new Date(2023, 2, 15), 25016], 
                //     // [new Date(2023, 2, 16), 25024], 
                //     // [new Date(2023, 2, 17), 2505], 
                //     // [new Date(2023, 2, 18), 25048], 
                //     // [new Date(2023, 2, 19), 25046], 
                //     // [new Date(2023, 2, 22), 25047], 
                //     // [new Date(2023, 2, 23), 25075], 
                //     // [new Date(2023, 2, 24), 25052], 
                //     // [new Date(2023, 2, 25), 25088], 
                //     // [new Date(2023, 2, 26), 25053], 
                //     // [new Date(2023, 2, 29), 25046], 
                //     // [new Date(2023, 2, 30), 25064], 
                //     // [new Date(2023, 2, 31), 25016], 
                //     [new Date(2023, 3, 1), 25003], 
                //     // [new Date(2023, 3, 5), 25014], 
                //     // [new Date(2023, 3, 6), 25019], 
                //     // [new Date(2023, 3, 7), 25022], 
                //     // [new Date(2023, 3, 8), 25059], 
                //     // [new Date(2023, 3, 9), 23029], 
                //     // [new Date(2023, 3, 12), 23078], 
                //     // [new Date(2023, 3, 13), 23071], 
                //     // [new Date(2023, 3, 14), 23078], 
                //     // [new Date(2023, 3, 15), 23073], 
                //     // [new Date(2023, 3, 16), 23063], 
                //     // [new Date(2023, 3, 19), 23029], 
                //     // [new Date(2023, 3, 20), 26052], 
                //     // [new Date(2023, 3, 21), 26059], 
                //     // [new Date(2023, 3, 22), 26075], 
                //     // [new Date(2023, 3, 23), 23072], 
                //     // [new Date(2023, 3, 26), 23057], 
                //     // [new Date(2023, 3, 27), 23071], 
                //     // [new Date(2023, 3, 28), 23077], 
                //     // [new Date(2023, 3, 29), 23076], 
                //     // [new Date(2023, 3, 30), 23054], 
                //     [new Date(2023, 4, 3), 23082], 
                //     // [new Date(2023, 4, 4), 24029], 
                //     // [new Date(2023, 4, 5), 24072], 
                //     // [new Date(2023, 4, 6), 28055], 
                //     // [new Date(2023, 4, 7), 28058], 
                //     // [new Date(2023, 4, 10), 28071], 
                //     // [new Date(2023, 4, 11), 28095], 
                //     // [new Date(2023, 4, 12), 24071], 
                //     // [new Date(2023, 4, 13), 24041], 
                //     // [new Date(2023, 4, 14), 28088], 
                //     // [new Date(2023, 4, 17), 28061], 
                //     // [new Date(2023, 4, 18), 28086], 
                //     // [new Date(2023, 4, 19), 28084], 
                //     // [new Date(2023, 4, 20), 24081], 
                //     // [new Date(2023, 4, 21), 26034], 
                //     // [new Date(2023, 4, 24), 26097] 
                // ] 
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

<style>
.bg-info{    
    width: 290px; 
    height: 170px; 
    margin-bottom: 0 !important;
}

.bg-info h3, .bg-info p{
    color: #ccc;
}

.bg-info:hover{
   color:#fff !important
   background-color:#0CA2A3 !important    
}

.small-box > .small-box-footer{
    padding: 0px !!important;
}


.small-box-footer .inner:hover{
    background-color: #0CA2A3;
}

.small-box-footer .inner:hover h3, .small-box-footer .inner:hover p{
    color: #fff;
}


</style>