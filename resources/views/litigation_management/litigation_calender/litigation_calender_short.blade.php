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
                <h3 class="" id="heading">Litigation Calendar</h3>
                <div class="row">
@php



   //dd($dates);
  // dd($dates->toDateString());
@endphp

                    @foreach($dates as $data)

                    <div class="col-md-2">
                        <div class="card border-secondary mb-3" style="max-width: 18rem;">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm text-bold text-uppercase text-primary">

                                        @php
                                            $civil_cases = \App\Models\CivilCases::where(['next_date' => $data->toDateString(),'delete_status' => 0])->count();
                                            $criminal_cases = \App\Models\CriminalCase::where(['next_date' => $data->toDateString(),'delete_status' => 0])->count();
                                            $labour_cases = \App\Models\LabourCase::where(['next_date' => $data->toDateString(),'delete_status' => 0])->count();
                                            $high_court_cases = \App\Models\HighCourtCase::where(['order_date' => $data->toDateString(),'delete_status' => 0])->count();

                                            $quassi_judicial_cases = \App\Models\QuassiJudicialCase::where(['next_date' => $data->toDateString(),'delete_status' => 0])->count();
                                            $appellate_cases = \App\Models\AppellateCourtCase::where(['order_date' => $data->toDateString(),'delete_status' => 0])->count();

                                            $others = $quassi_judicial_cases + $appellate_cases;
                                            $explode_date = explode('-',$data->toDateString());

                                            $total = $civil_cases + $criminal_cases + $labour_cases + $high_court_cases + $quassi_judicial_cases + $appellate_cases;
                                        @endphp
                                        {{ $explode_date[2] }}

                                        ({{ date('D', strtotime($data->toDateString())) }})

                                    </div>
                                    <div class="col-sm text-bold text-danger">
                                      <span class="float-right">{{ $total }}</span>
                                    </div>
                                  </div>
                            </div>
                            <div class="card-body text-secondary">
                              <p class="card-text">Civil: {{ $civil_cases }}</p>
                              <p class="card-text">Criminal: {{ $criminal_cases }}</p>
                              <p class="card-text">Labour: {{ $labour_cases }}</p>
                              <p class="card-text">Other: {{ $others }}</p>
                              <p class="card-text">HC: {{ $high_court_cases }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>




        <!-- Main content -->

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



@endsection
