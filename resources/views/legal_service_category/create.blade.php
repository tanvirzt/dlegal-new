@extends('layouts.admin_layouts.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Admin Setup</h1>

                    </div><!-- /.col -->



                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md"
                                    type="button" href="{{ route('client-name') }}" aria-disabled="false" role="link"
                                    tabindex="-1">Back</a>
                            </li>
                        </ol>
                    </div>


                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="row im-flex">

                <div class="col-md-8 mx-auto">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="">
                            <div class="card-header">
                                <h3 class="card-title" id="heading">Add Legal Service Category Name</h3>
                            </div>

                            <form action="{{ route('legal-service-category.store') }}" method="post">
                                @csrf
                                <div class="card-body">

                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label for="client_name">Legal Service Type Name</label>
                                            <input type="text" class="form-control" name="legal_service_type"
                                                id="client_name">
                                            @error('client_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label for="client_name">Legal Service Category Name</label>
                                            <input type="text" class="form-control" name="legal_service_category"
                                                id="client_name">
                                            @error('client_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="float-right">
                                            <button type="submit" class="btn btn-primary text-uppercase"><i
                                                    class="fas fa-save"></i> Save</button>

                                        </div>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>

                </div>
        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
@endsection
