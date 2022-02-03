@extends('layouts.admin_layouts.admin_layout')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Civil Cases </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active"> Civil Cases </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                {{Session::get('success')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> List </h3>
                                <div class="float-right">
                                    <a href="{{ route('add-civil-cases') }}"><button class="btn btn-sm
                                    btn-success"><i class="fas fa-plus"></i> Add Civil Cases </button></a>
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="data_table" class="table dataTable no-footer dtr-inline">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Case No</th>
                                        <th>Division</th>
                                        <th>Subsequent Case Name</th>
                                        <th>Name of Court</th>
                                        <th>Location</th>
                                        <th>Plaintiff Name</th>
                                        <th>Defendent Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $datum)

                                        <tr>
                                            <td>
                                                {{ $datum->id }}
                                            </td>
                                            <td>
                                                {{ $datum->case_no }}
                                            </td>
                                            <td>
                                                {{ $datum->case_category_nature_id }}
                                            </td>
                                            <td>
                                                {{ $datum->subsequent_plaintiff_name }}
                                            </td>
                                            <td>
                                                {{ $datum->case_no }}
                                            </td>
                                            <td>
                                                {{ $datum->case_no }}
                                            </td>
                                            
                                            <td>
                                                @if($datum->delete_status == 0)
                                                    Active
                                                @else

                                                    Inactive
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('edit-civil-cases',$datum->id) }}"><button class="badge badge-info btn-sm"
                                                    >Edit</button></a>
                                                <span class="badge badge-danger btn-sm">
                                                <form method="POST" action="{{ route('delete-civil-cases',$datum->id) }}">
                                                    @csrf
                                                        <input type="submit" class="delete-user"
                                                               value="Delete">
                                                </form>
                                                </span>
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
    </div>
    <!-- /.content-wrapper -->

@endsection


