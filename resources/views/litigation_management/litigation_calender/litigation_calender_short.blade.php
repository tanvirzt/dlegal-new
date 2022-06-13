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

                    <div class="col-md-2">
                        <div class="card border-secondary mb-3" style="max-width: 18rem;">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm">
                                      3
                                    </div>
                                    <div class="col-sm">
                                      12
                                    </div>
                                  </div>
                            </div>
                            <div class="card-body text-secondary">
                              <p class="card-text">Civil: </p>
                              <p class="card-text">Criminal: </p>
                              <p class="card-text">Labour: </p>
                              <p class="card-text">Other: </p>
                              <p class="card-text">HC: </p>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-2">
                        <div class="card border-secondary mb-3" style="max-width: 18rem;">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm">
                                      3
                                    </div>
                                    <div class="col-sm">
                                      12
                                    </div>
                                  </div>
                            </div>
                            <div class="card-body text-secondary">
                              <p class="card-text">Civil: </p>
                              <p class="card-text">Criminal: </p>
                              <p class="card-text">Labour: </p>
                              <p class="card-text">Other: </p>
                              <p class="card-text">HC: </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card border-secondary mb-3" style="max-width: 18rem;">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm">
                                      3
                                    </div>
                                    <div class="col-sm">
                                      12
                                    </div>
                                  </div>
                            </div>
                            <div class="card-body text-secondary">
                              <p class="card-text">Civil: </p>
                              <p class="card-text">Criminal: </p>
                              <p class="card-text">Labour: </p>
                              <p class="card-text">Other: </p>
                              <p class="card-text">HC: </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card border-secondary mb-3" style="max-width: 18rem;">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm">
                                      3
                                    </div>
                                    <div class="col-sm">
                                      12
                                    </div>
                                  </div>
                            </div>
                            <div class="card-body text-secondary">
                              <p class="card-text">Civil: </p>
                              <p class="card-text">Criminal: </p>
                              <p class="card-text">Labour: </p>
                              <p class="card-text">Other: </p>
                              <p class="card-text">HC: </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card border-secondary mb-3" style="max-width: 18rem;">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm">
                                      3
                                    </div>
                                    <div class="col-sm">
                                      12
                                    </div>
                                  </div>
                            </div>
                            <div class="card-body text-secondary">
                              <p class="card-text">Civil: </p>
                              <p class="card-text">Criminal: </p>
                              <p class="card-text">Labour: </p>
                              <p class="card-text">Other: </p>
                              <p class="card-text">HC: </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card border-secondary mb-3" style="max-width: 18rem;">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm">
                                      3
                                    </div>
                                    <div class="col-sm">
                                      12
                                    </div>
                                  </div>
                            </div>
                            <div class="card-body text-secondary">
                              <p class="card-text">Civil: </p>
                              <p class="card-text">Criminal: </p>
                              <p class="card-text">Labour: </p>
                              <p class="card-text">Other: </p>
                              <p class="card-text">HC: </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card border-secondary mb-3" style="max-width: 18rem;">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm">
                                      3
                                    </div>
                                    <div class="col-sm">
                                      12
                                    </div>
                                  </div>
                            </div>
                            <div class="card-body text-secondary">
                              <p class="card-text">Civil: </p>
                              <p class="card-text">Criminal: </p>
                              <p class="card-text">Labour: </p>
                              <p class="card-text">Other: </p>
                              <p class="card-text">HC: </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card border-secondary mb-3" style="max-width: 18rem;">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm">
                                      3
                                    </div>
                                    <div class="col-sm">
                                      12
                                    </div>
                                  </div>
                            </div>
                            <div class="card-body text-secondary">
                              <p class="card-text">Civil: </p>
                              <p class="card-text">Criminal: </p>
                              <p class="card-text">Labour: </p>
                              <p class="card-text">Other: </p>
                              <p class="card-text">HC: </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card border-secondary mb-3" style="max-width: 18rem;">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm">
                                      3
                                    </div>
                                    <div class="col-sm">
                                      12
                                    </div>
                                  </div>
                            </div>
                            <div class="card-body text-secondary">
                              <p class="card-text">Civil: </p>
                              <p class="card-text">Criminal: </p>
                              <p class="card-text">Labour: </p>
                              <p class="card-text">Other: </p>
                              <p class="card-text">HC: </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card border-secondary mb-3" style="max-width: 18rem;">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm">
                                      3
                                    </div>
                                    <div class="col-sm">
                                      12
                                    </div>
                                  </div>
                            </div>
                            <div class="card-body text-secondary">
                              <p class="card-text">Civil: </p>
                              <p class="card-text">Criminal: </p>
                              <p class="card-text">Labour: </p>
                              <p class="card-text">Other: </p>
                              <p class="card-text">HC: </p>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                </div>
            </div>
        </section>




        <!-- Main content -->

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



@endsection
