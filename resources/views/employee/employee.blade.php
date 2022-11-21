@extends('layouts.admin_layouts.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Employee </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active"> Employee</li>
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
                                    @can('civil-cases-create')
                                    <a href="#">
                                        <button
                                            class="btn btn-sm
                                    btn-success add_btn"><i
                                                class="fas fa-plus"></i> Add Employee
                                        </button>
                                    </a>
                                    @endcan
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th class="text-nowrap text-center">ID</th>
                                        <th class="text-nowrap text-center">Case No</th>
                                        <th class="text-center">Next Date</th>
                                        <th class="text-center">Received Date</th>
                                        <th class="text-nowrap"> Amount </th>
                                        <th class="text-center">Client</th>
                                        <th class="text-nowrap">Client Address</th>
                                        <th class="text-nowrap">Allegation Claim</th>
                                        <th class="text-center">Status</th>
                                        <th width="13%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="search_data">
                                    {{-- @foreach ($data as $datum)
                                        <tr>
                                            <td>
                                                    {{ $datum->id }}
                                            </td>
                                            <td>
                                                <a href="{{ route('view-civil-cases', $datum->id) }}">
                                                    {{ $datum->case_no }} </a>
                                            </td>
                                            <td>
                                                    {{ $datum->next_date }}
                                            </td>
                                            <td>
                                                {{ $datum->received_date }}
                                            </td>
                                            <td>
                                                {{ $datum->amount_of_money }}
                                            </td>
                                            <td>
                                                {{ $datum->client }}
                                            </td>
                                            <td>
                                                {{ $datum->client_address }}
                                            </td>
                                            <td>
                                                {{ $datum->allegation_claim }}
                                            </td>
                                            <td>
                                                @if ($datum->delete_status == 0)
                                                    <button type="button"
                                                            class="btn-custom btn-success-custom text-uppercase"> Active
                                                    </button>
                                                @else
                                                    <button type="button"
                                                            class="btn-custom btn-warning-custom text-uppercase">
                                                        Inactive
                                                    </button>
                                                    @endif
                                                    </span>
                                            </td>

                                            <td>
                                                @can('civil-cases-view')

                                                    <a href="{{ route('view-civil-cases', $datum->id) }}">
                                                        <button
                                                            class="btn btn-primary btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Details"><i
                                                                class="fas fa-eye"></i></button>
                                                    </a>
                                                @endcan
                                                    @can('civil-cases-add-billing')

                                                    <a href="{{ route('add-billing-civil-cases', $datum->id) }}">
                                                        <button
                                                            class="btn btn-warning btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Bill Entry"><i
                                                                class="fas fa-money-bill"></i></button>
                                                    </a>
                                                    @endcan
                                                    @can('civil-cases-edit')

                                                    <a href="{{ route('edit-civil-cases', $datum->id) }}">
                                                        <button
                                                            class="btn btn-info btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Edit"><i
                                                                class="fas fa-edit"></i></button>
                                                    </a>
                                                    @endcan
                                                    @can('civil-cases-delete')
                                                    <form method="POST"
                                                          action="{{ route('delete-civil-cases', $datum->id) }}"
                                                          class="delete-user btn btn-danger btn-xs">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="Delete"><i
                                                                class="fas fa-trash"></i></button>
                                                    </form>
                                                    @endcan


                                            </td>
                                        </tr>
                                    @endforeach --}}
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
