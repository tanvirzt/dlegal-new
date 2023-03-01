@extends('layouts.admin_layouts.admin_layout')
@section('content')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Billing</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md"
                                    type="button" href="{{ route('billings') }}" aria-readonly="false" role="link"
                                    tabindex="-1">Back</a>
                            </li>
                        </ol>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="card ml-5 mr-5">

            <div class="card-body">
                <h5 class="card-title">Case No : 101</h5><br>
                <h5 class="card-title">Court Name : DS 12</h5><br>
                <h5 class="card-title">Case Status : Argument</h5><br>
                <h5 class="card-title">Fixed for : Appeal</h5><br>
                <h5 class="card-title">Next Date Fixed For : 10/03/2023</h5>
            </div>
        </div>
        <div class="card ml-5 mr-5">

            <div class="card-body">
                <h5 class="card-title" style="font-weight: bold">Service Information</h5><br><br>
             
            </div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Service Info </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Service Status</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Events & Stages</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link disabled" href="#">Party Info</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link disabled" href="#">Lawyer Info</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link disabled" href="#">Service Doc</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link disabled" href="#">Service Activity Log</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link disabled" href="#"> Bill Log</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
@endsection
