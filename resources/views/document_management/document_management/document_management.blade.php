@extends('layouts.admin_layouts.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Document Management </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active"> Document Management </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row">



                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> List </h3>
                                <div class="float-right">
                                    <a href="{{ route('add-social-compliance') }}"><button
                                            class="btn btn-sm btn-success add_btn"><i class="fas fa-plus"></i> Add
                                            Document Management </button></a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">



                                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                                <script src="{{ asset('treetable/dist/jquery-simple-tree-table.js') }}"></script>


                                <table id="opened" class="table table-responsive table-hover table-stripped no-footer dtr-inline">
                                    
                                    <tr data-node-id="1.2" data-node-pid="1">
                                      <td>Litigation Management</td>
                                      <td></td>
                                    </tr>
                                    <tr data-node-id="1.2.1" data-node-pid="1.2">
                                      <td>Cases</td>
                                      <td></td>
                                    </tr>
                                    <tr data-node-id="1.2.1.1" data-node-pid="1.2.1">
                                      <td>Civil Cases</td>
                                      <td></td>
                                    </tr>

                                    
                                    <tr data-node-id="1.2.1.2" data-node-pid="1.2.1.1">
                                      <td>Case No: 14564151</td>
                                      <td></td>
                                    </tr>



                                    <tr data-node-id="1.2.1.3" data-node-pid="1.2.1.2">
                                      <td>Case No : 1, File: 45</td>
                                      <td></td>
                                    </tr>
                                    <tr data-node-id="1.2.1.3" data-node-pid="1.2.1.2">
                                      <td>Case No : 1, File: 12</td>
                                      <td></td>
                                    </tr>
                                    <tr data-node-id="1.2.1.3" data-node-pid="1.2.1.2">
                                      <td>Case No: 2, File: 36</td>
                                      <td><a href="">Download</a></td>
                                    </tr>



                                  </table>
                                  <script>
                                  $('#opened').simpleTreeTable({
                                    opened: [1, 1.1]
                                  });
                                  </script>













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
    <!-- /.content-wrapper -->
@endsection
