@extends('layouts.admin_layouts.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Billings </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active"> Billings </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-md-8">
                        <div class="card">
                            <div id="accordion">

                                <div class="card-header" id="headingTwo">
                                    <h3 class="card-title"> Billings :: Search </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn collapsed" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>


                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordion">
                                    <div class="card-body">


                                        <form id="form-data" method="post" action="{{ route('search_civil_cases') }}">
                                            @csrf


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="case_no" class="col-sm-4 col-form-label">Case
                                                            No.</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="case_no"
                                                                name="case_no" value="{{ old('case_no') }}">
                                                            @error('case_no')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="date_of_filing" class="col-sm-4 col-form-label"> Date of
                                                            Filing </label>
                                                        <div class="col-sm-8">
                                                            <input type="date" class="form-control" id="date_of_filing"
                                                                name="date_of_filing" value="{{ old('date_of_filing') }}">
                                                            @error('date_of_filing')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="float-right">
                                                <button type="submit" id="submit" class="btn btn-primary text-uppercase"><i
                                                        class="fas fa-search"></i> Search </button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">

                        <section class="content">

                            <!-- Default box -->
                            <div class="card card-solid">
                                <div class="card-header">
                                    <h3 class="card-title"> Billings </h3>
                                    <div class="float-right">
                                        <a href="{{ route('add-billing') }}"><button
                                                class="btn btn-sm
                                        btn-success add_btn"><i
                                                    class="fas fa-plus"></i> Add Billings </button></a>
                                    </div>
                                </div>



                            <div class="row p-3">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="">
                                                <div class="card-body">
                
                                                    <div class="col-md-12">
                                                        <p class="text-muted text-sm"><b>Case Type: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Case no: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>District: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Panel Lawyer: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Bill Amount: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Date of the Bill: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Checque No: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Name of Bank: </b> Web Designer  </p>                                                        
                                                    </div>
                
                                                </div>
                
                                        </div>
                                    </div>
                
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="">
                                                <div class="card-body">
                
                                                    <div class="col-md-12">
                                                        <p class="text-muted text-sm"><b>Case Type: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Case no: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>District: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Panel Lawyer: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Bill Amount: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Date of the Bill: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Checque No: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Name of Bank: </b> Web Designer  </p>                                                        
                                                    </div>
                
                                                </div>
                
                                        </div>
                                    </div>
                
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="">
                                                <div class="card-body">
                
                                                    <div class="col-md-12">
                                                        <p class="text-muted text-sm"><b>Case Type: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Case no: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>District: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Panel Lawyer: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Bill Amount: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Date of the Bill: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Checque No: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Name of Bank: </b> Web Designer  </p>                                                        
                                                    </div>
                
                                                </div>
                
                                        </div>
                                    </div>
                
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="">
                                                <div class="card-body">
                
                                                    <div class="col-md-12">
                                                        <p class="text-muted text-sm"><b>Case Type: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Case no: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>District: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Panel Lawyer: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Bill Amount: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Date of the Bill: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Checque No: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Name of Bank: </b> Web Designer  </p>                                                        
                                                    </div>
                
                                                </div>
                
                                        </div>
                                    </div>
                
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="">
                                                <div class="card-body">
                
                                                    <div class="col-md-12">
                                                        <p class="text-muted text-sm"><b>Case Type: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Case no: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>District: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Panel Lawyer: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Bill Amount: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Date of the Bill: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Checque No: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Name of Bank: </b> Web Designer  </p>                                                        
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="">
                                                <div class="card-body">
                
                                                    <div class="col-md-12">
                                                        <p class="text-muted text-sm"><b>Case Type: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Case no: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>District: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Panel Lawyer: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Bill Amount: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Date of the Bill: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Checque No: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Name of Bank: </b> Web Designer  </p>                                                        
                                                    </div>
                
                                                </div>
                
                                        </div>
                                    </div>
                
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="">
                                                <div class="card-body">
                
                                                    <div class="col-md-12">
                                                        <p class="text-muted text-sm"><b>Case Type: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Case no: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>District: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Panel Lawyer: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Bill Amount: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Date of the Bill: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Checque No: </b> Web Designer  </p>
                                                        <p class="text-muted text-sm"><b>Name of Bank: </b> Web Designer  </p>                                                        
                                                    </div>
                
                                                </div>
                
                                        </div>
                                    </div>
                
                                </div>

                            </div>










                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <nav aria-label="Contacts Page Navigation">
                                        <ul class="pagination justify-content-center m-0">
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                                            <li class="page-item"><a class="page-link" href="#">6</a></li>
                                            <li class="page-item"><a class="page-link" href="#">7</a></li>
                                            <li class="page-item"><a class="page-link" href="#">8</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->

                        </section>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
