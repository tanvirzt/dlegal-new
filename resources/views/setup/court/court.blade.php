@extends('layouts.admin_layouts.admin_layout')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Court </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active"> Court </li>
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
                                    @can('court-name-create')
                                    <a href="{{ route('add-court') }}"><button class="btn btn-sm
                                    btn-success add_btn"><i class="fas fa-plus"></i> Add Court </button></a>
                                    @endcan
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="data_table" class="table dataTable no-footer dtr-inline">
                                    <thead>
                                    <tr>
                                        <th class="text-center text-nowrap">ID</th>
                                        {{-- <th class="text-center text-nowrap">Case Type</th> --}}
                                        <th class="text-center text-nowrap">Class of Cases</th>
                                        <th class="text-center text-nowrap">Case Category</th>
                                        <th class="text-center text-nowrap">Applicable District</th>
                                        <th class="text-center text-nowrap">Applicable for All District</th>
                                        <th class="text-center text-nowrap">Court Name</th>
                                        <th class="text-center text-nowrap">Court Name(Short)</th>
                                        <th class="text-center text-nowrap">Status</th>
                                        <th class="text-center text-nowrap">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $datum)

                                        <tr>
                                            <td class="text-center">
                                                {{ $datum->id }}
                                            </td>
                                            {{-- <td class="text-center">
                                                {{ $datum->case_type }}
                                            </td> --}}
                                            <td class="text-center">
                                                {{ $datum->case_class_id }}
                                            </td>
                                            <td class="text-center">
                                                {{ $datum->case_category }}
                                            </td>
                                            <td class="text-center">
                                                {{ $datum->applicable_district_id }}
                                            </td>
                                            <td class="text-center">
                                                {{ $datum->all_district == 'on' ? 'Yes' : 'No' }}
                                            </td>
                                            <td class="text-center">
                                                {{ $datum->court_name }}
                                            </td>
                                            <td class="text-center">
                                                {{ $datum->court_short_name }}
                                            </td>
                                            <td class="text-center">
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
                                            <td class="text-center">
                                                @can('court-name-edit')
                                                <a href="{{ route('edit-court',$datum->id) }}"><button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"
                                                    ><i class="fas fa-edit"></i></button></a>
                                                @endcan
                                                @can('court-name-delete')
                                                    <form method="POST" action="{{ route('delete-court',$datum->id) }}" class="delete-user btn btn-danger btn-xs">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i> </button>
                                                    </form>
                                                 @endcan
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


