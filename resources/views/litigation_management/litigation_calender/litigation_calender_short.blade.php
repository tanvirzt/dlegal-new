@extends('layouts.admin_layouts.admin_layout')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div>
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('litigation-calender-list') }}">
                                    <button type="button" class="btn btn-block bg-gradient-info">Litigation Calendar(List)</button>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('litigation-calender-short') }}">
                                    <button type="button" class="btn btn-block bg-gradient-success">Litigation Calendar(Short)</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <h3 class="" id="heading">Litigation Calendar({{ date('F, Y') }})</h3>
                <div class="row">
@php



   //dd($dates);
  // dd($dates->toDateString());
@endphp

                    @foreach($dates as $data)

                    {{-- <div class="col-md-2"> --}}
                        <div class="card border-secondary mb-3 mr-4" style="min-width: 120px;">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-9 text-bold text-uppercase text-primary" style="font-size: 14px;">

                                        @php
                                            $civil_cases = \App\Models\CivilCases::where(['next_date' => $data->toDateString(),'delete_status' => 0])->count();
                                            $criminal_cases = \App\Models\CriminalCase::where(['next_date' => $data->toDateString(),'delete_status' => 0])->count();
                                            $labour_cases = \App\Models\LabourCase::where(['next_date' => $data->toDateString(),'delete_status' => 0])->count();
                                            $high_court_cases = \App\Models\HighCourtCase::where(['order_date' => $data->toDateString(),'delete_status' => 0])->count();

                                            $quassi_judicial_cases = \App\Models\QuassiJudicialCase::where(['next_date' => $data->toDateString(),'delete_status' => 0])->count();
                                            $appellate_cases = \App\Models\AppellateCourtCase::where(['order_date' => $data->toDateString(),'delete_status' => 0])->count();

                                            // $quassi_judicial_cases = $quassi_judicial_cases;
                                            $explode_date = explode('-',$data->toDateString());

                                            $total = $civil_cases + $criminal_cases + $labour_cases + $high_court_cases + $quassi_judicial_cases + $appellate_cases;
                                        @endphp
                                        {{ ltrim($explode_date[2], '0') }}

                                        ({{ date('D', strtotime($data->toDateString())) }})

                                    </div>
                                    <div class="col-md-3 text-bold text-danger">
                                      <span class="float-right">{{ $total == 0 ? '' : $total}}</span>
                                    </div>
                                  </div>
                            </div>
                            <div class="card-body text-secondary" style="padding: 0px 5px 5px 5px;">
                                <div class="d-flex flex-row" style="height:20px;"><div class="p-2" style="min-width: 56px;">Civil</div><div class="p-2"> :</div><div class="p-2">{{ $civil_cases == 0 ? '' : $civil_cases }}</div></div>
                                <div class="d-flex flex-row" style="height:20px;"><div class="p-2" style="min-width: 0px;">Criminal</div><div class="p-2">:</div><div class="p-2"><a href="{{ $criminal_cases == 0 ? '' :  route('litigation-calender-list')}}">{{ $criminal_cases == 0 ? '' :  $criminal_cases}}</a> </div></div>
                                <div class="d-flex flex-row" style="height:20px;"><div class="p-2" style="min-width: 56px;">Service</div><div class="p-2">:</div><div class="p-2">{{ $labour_cases == 0 ? '' : $labour_cases}}</div></div>
                                <div class="d-flex flex-row" style="height:20px;"><div class="p-2" style="min-width: 56px;">Other</div><div class="p-2">:</div><div class="p-2"> {{ $quassi_judicial_cases == 0     ? '' :  $quassi_judicial_cases}}</div></div>
                                <div class="d-flex flex-row" style="height:20px;"><div class="p-2" style="min-width: 56px;">HCD</div><div class="p-2">:</div><div class="p-2">{{ $high_court_cases == 0 ? '' : $high_court_cases }}</div></div>
                                <div class="d-flex flex-row" style="height:20px;"><div class="p-2" style="min-width: 56px;">AD</div><div class="p-2">:</div><div class="p-2">{{ $appellate_cases == 0 ? '' : $appellate_cases }}</div></div>



                              {{-- <p class="card-text">Civil <span class="float-right">: {{ $civil_cases == 0 ? '' : $civil_cases }} </span></p>
                              <p class="card-text">Criminal <span class="float-right">: {{ $criminal_cases == 0 ? '' :  $criminal_cases}}</span></p>
                              <p class="card-text">Labour <span class="float-right">: {{ $labour_cases == 0 ? '' : $labour_cases}} </span></p>
                              <p class="card-text">Other <span class="float-right">: {{ $quassi_judicial_cases == 0     ? '' :  $quassi_judicial_cases}}</span></p>
                              <p class="card-text">HC <span class="float-right">: {{ $appellate_cases == 0 ? '' : $appellate_cases }}</span></p> --}}
                            </div>
                        </div>
                    {{-- </div> --}}
                    @endforeach
                </div>
            </div>
        </section>




        <!-- Main content -->

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



@endsection
