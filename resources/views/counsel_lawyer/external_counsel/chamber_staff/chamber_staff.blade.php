@extends('layouts.admin_layouts.admin_layout')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Chamber Staff </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active"> Chamber Staff </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{Session::get('success')}}
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
                                    <a href="{{ route('create-chamber-staff') }}"><button class="btn btn-sm
                                    btn-success add_btn"><i class="fas fa-plus"></i> Add Chamber Staff </button></a>
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped data_table">
                                    <thead>
                                    <tr>
                                        <th class="text-center"> Sl </th>
                                        <th class="text-center"> Role </th>
                                        <th class="text-center"> Name </th>
                                        <th class="text-nowrap"> Date of Joining </th>
                                        <th class="text-center"> Status </th>
                                        <th width="13%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="search_data">
                                    @foreach($data as $key=>$datum)
                                        <tr>
                                            <td>
                                                {{ $key+1 }}
                                            </td>
                                            <td>
                                                {{ $datum->counsel_role_id }}
                                            </td>
                                            <td>
                                                {{ $datum->counsel_name }}
                                            </td>
                                            <td>
                                                {{ $datum->date_of_joining }}
                                            </td>

                                            <td>
                                                @if ($datum->delete_status == 0)
                                                    <button type="button"
                                                        class="btn-custom btn-success-custom text-uppercase"> Active
                                                    </button>
                                                @else
                                                    <button type="button"
                                                        class="btn-custom btn-warning-custom text-uppercase">Inactive</button>
                                                @endif
                                                </span>
                                            </td>
                                            <td>
                                            {{-- <a href="{{ route('view-counsel',$datum->id) }}"><button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Details"
                                                ><i class="fas fa-eye"></i></button></a>
                                             --}}
                                            <a href="{{ route('edit-chamber-staff',$datum->id) }}"><button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"
                                                ><i class="fas fa-edit"></i></button></a>
                                                <form method="POST" action="{{ route('delete-chamber-staff',$datum->id) }}" class="delete-user btn btn-danger btn-xs">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i> </button>
                                                </form>
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


