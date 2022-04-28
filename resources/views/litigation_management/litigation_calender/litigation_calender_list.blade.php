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
                                    <button type="button" class="btn btn-block bg-gradient-info">Litigation Calender</button>
                                </a>
                            </div>
{{--                            <div class="col-md-6">--}}
{{--                                <a href="{{ route('litigation-calender-short') }}">--}}
{{--                                    <button type="button" class="btn btn-block bg-gradient-success">Litigation Calender(Short)</button>--}}
{{--                                </a>--}}
{{--                            </div>--}}
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

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
@foreach($criminal_cases as $data)
                <h3 class="" id="heading">Litigation Calender</h3>
                <div class="card">

                    <div class="card-header">
                        <h3 class="card-title">
                            <div class="row">
                                <div class="col-12 col-md-2">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content" style="margin-right: 130px;">
                                            <span class="info-box-text text-center text-muted text-bold">21-04-2022</span>
                                            <span class="info-box-number text-center text-muted mb-0 text-bold">Thursday</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted text-bold">Total</span>
                                            <span class="info-box-number text-center text-muted mb-0 text-bold">6</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted text-bold">Civil Cases</span>
                                            <span class="info-box-number text-center text-muted mb-0 text-bold">2</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted text-bold">Criminal Cases</span>
                                            <span class="info-box-number text-center text-muted mb-0 text-bold">3</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted text-bold">Others</span>
                                            <span class="info-box-number text-center text-muted mb-0 text-bold">1</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>

                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped data_table">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Court Name</th>
                                <th>Case Number</th>
                                <th>Fixed For</th>
                                <th>1st Party/Complainant</th>
                                <th>2nd Party/Accused</th>
                                <th>Step to be taken</th>
                                <th>Day Note</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            @endforeach
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
