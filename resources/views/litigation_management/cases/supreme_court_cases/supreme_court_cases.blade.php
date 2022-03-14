@extends('layouts.admin_layouts.admin_layout')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Supreme Court of Bangladesh </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active"> Supreme Court of Bangladesh </li>
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
                                    <a href="{{ route('add-supreme-court-cases') }}"><button class="btn btn-sm
                                    btn-success add_btn"><i class="fas fa-plus"></i> Add Supreme Court of Bangladesh </button></a>
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="data_table" class="table dataTable no-footer dtr-inline">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Case No</th>
                                        <th class="text-center">Subsequent Case No</th>
                                        <th class="text-center">Division</th>
                                        <th class="text-center">Court Name</th>
                                        <th class="text-center">District</th>
                                        <th class="text-center">Company</th>
                                        <th class="text-center">Plaintiff Name</th>
                                        <th class="text-center">Status</th>
                                        <th width="13%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $datum)

                                        <tr>
                                            <td>
                                                <a href="{{ route('view-supreme-court-cases', $datum->id) }}">{{ $datum->case_no }} </a>
                                            </td>
                                            <td>
                                                {{ $datum->subsequent_case_no }}
                                            </td>
                                            <td>
                                                {{ $datum->division_name }}
                                            </td>
                                            <td>
                                                {{ $datum->court_name }}
                                            </td>
                                            <td>
                                                {{ $datum->district_name }}
                                            </td>
                                            
                                            <td>
                                                {{ $datum->company_name }}
                                            </td>
                                            
                                            <td>
                                                {{ $datum->plaintiff_name }}
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
                                                <a href="{{ route('view-supreme-court-cases',$datum->id) }}"><button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Details"
                                                    ><i class="fas fa-eye"></i></button></a>
                                                <a href="{{ route('add-billing-supreme-court-cases', $datum->id) }}"><button
                                                    class="btn btn-warning btn-sm" data-toggle="tooltip"
                                                    data-placement="top" title="Bill Entry"><i class="fas fa-money-bill"></i></button></a>
                                                <a href="{{ route('edit-supreme-court-cases',$datum->id) }}"><button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"
                                                    ><i class="fas fa-edit"></i></button></a>
                                                <form method="POST" action="{{ route('delete-supreme-court-cases',$datum->id) }}" class="delete-user btn btn-danger btn-xs">
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


