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


                        @php
                            
                            $civil_case = App\Models\CivilCases::where('delete_status', 0)->count();
                            $criminal_case = App\Models\CriminalCase::where('delete_status', 0)->count();
                            $quassi_case = App\Models\QuassiJudicialCase::where('delete_status', 0)->count();
                            $labour_case = App\Models\LabourCase::where('delete_status', 0)->count();
                            $supreme_case = App\Models\SupremeCourtCase::where('delete_status', 0)->count();
                            $high_case = App\Models\HighCourtCase::where('delete_status', 0)->count();
                            
                            $total_cases = $civil_case + $criminal_case + $quassi_case + $labour_case + $supreme_case + $high_case;
                            
                        @endphp


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
                                        width="487" height="300"></canvas>
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
                                <div id="chartDiv" style="max-width: 500px;height: 370px;margin: 0px auto;"></div>
                            </div>
                        </div>
        
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Summary</h3>
                             
                            </div>
                            <div class="card-body">
                                <canvas id="casesChart"
                                        width="487" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6"></div>
                </div>
            </div>
        </section>   
        
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



    var casectx = document.getElementById('casesChart').getContext('2d');

    // const data = {
    //     labels: [
    //         'Civil',
    //         'Criminal',
    //     ],
    //     datasets: [{
    //         label: 'All Cases',
    //         data: [300, 50],
    //         backgroundColor: [
    //         'rgb(255, 99, 132)',
    //         'rgb(54, 162, 235)'
    //         ],
    //         hoverOffset: 4
    //     }]
    // };

    // var chartData = {
    //         labels: [
    //             "Red",
    //             "Blue",
    //             "Yellow",
    //         ],
    //         datasets: [
    //             {
    //                 data: [300, 50, 100],
    //                 backgroundColor: [
    //                 "#FF6384",
    //                 "#36A2EB",
    //                 "#FFCE56"
    //                 ],
    //                 hoverBackgroundColor: [
    //                 "#FF6384",
    //                 "#36A2EB",
    //                 "#FFCE56"
    //                 ]
    //             }, 
    //             {
    //                 data: [200, 100, 25, 25, 66, 34],
    //                 backgroundColor: [
    //                 "#FF6384",
    //                 "#36A2EB",
    //                 "#FFCE56",
    //                 "#FF6384",
    //                 "#36A2EB",
    //                 "#FFCE56"
    //                 ],
    //                 hoverBackgroundColor: [
    //                     "#FF6384",
    //                     "#36A2EB",
    //                     "#FFCE56",
    //                     "#FF6384",
    //                     "#36A2EB",
    //                     "#FFCE56"
    //                 ]
    //             }
    //         ]
    // };
    var chartData = {
        datasets: [
            {
                backgroundColor: [   
                    "#FF9900",
                    "#109618",
                    "#990099",
                    "#3B3EAC"
                    ],
                hoverBackgroundColor: [
                    "#FF9900",
                    "#109618",
                    "#990099",
                    "#3B3EAC"
                ],
                data: [
                    70,
                    80,
                    100,
                     0,
                    60,
                    40,
                    30,
                    0,
                ],
                labels:[
                    'test',
                    'test2'
                ]
            },
            {
                backgroundColor: [
                    "#3366CC",
                    "#DC3912",
                    "#FF9900",
                    "#109618",
                    "#990099",
                    "#3B3EAC"
                ],
                hoverBackgroundColor: [
                    "#3366CC",
                    "#DC3912",
                    "#FF9900",
                    "#109618",
                    "#990099",
                    "#3B3EAC"
                ],
                data: [
                    50,
                    150
                ],
                labels:[
                    'test',
                    'test2'
                ]
            }
        ],
		labels: [
			"Civil",
			"Criminal",
			"Suit/Cases",
			"Appeal",
			"Revision",
			"Misc.",
		]
    };
    var chartCase = new Chart(casectx,{
        type: 'pie',
         data: chartData,
    })


    JSC.chart('chartDiv', {
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
            points: [
              { x: 'Suit', y: {{ $civilObj->cSuit}}, legendEntry_sortOrder: 2, attributes_year: 'Civil' },
              { x: 'Appeal', y: {{ $civilObj->cApp}} , legendEntry_sortOrder: 2, attributes_year: 'Civil' },
              { x: 'Revision', y:{{ $civilObj->cRevi}}, legendEntry_sortOrder: 2, attributes_year: 'Civil' },
              { x: 'Misc.', y:{{ $civilObj->cMsic}}, legendEntry_sortOrder: 2, attributes_year: 'Civil' },
             
              { x: 'Cases', y: {{ $criminalObj->cSuit}}, legendEntry_sortOrder: 4, attributes_year: 'Criminal' },
              { x: 'Appeal', y: {{ $criminalObj->cApp}}, legendEntry_sortOrder: 4, attributes_year: 'Criminal' },
              { x: 'Revision', y: {{ $criminalObj->cRevi}}, legendEntry_sortOrder: 4, attributes_year: 'Criminal' },
              { x: 'Misc.', y: {{ $criminalObj->cMsic}}, legendEntry_sortOrder: 4, attributes_year: 'Criminal' },
            ],
            defaultPoint_tooltip: '<b>%year %name</b><br>total_cases: <b>{%yValue}</b>',
            shape: { innerSize: '55%', size: '80%' },
            palette: JSC.colorToPalette('#66bb6a', { lightness: 0.4 }, 4, 0).concat(
              JSC.colorToPalette('#ffca28', { lightness: 0.4 }, 4, 0),
              JSC.colorToPalette('#ef5350', { lightness: 0.4 }, 4, 0)
            )
          }
        ]
      });

});
</script>

