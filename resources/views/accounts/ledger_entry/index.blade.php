@extends('layouts.admin_layouts.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Ledger Entry </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active"> Ledger Entry</li>
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
                                        <a href="{{ route('ledger-entry.create') }}">
                                            <button
                                                class="btn btn-sm
                                    btn-success add_btn"><i
                                                    class="fas fa-plus"></i> Add Ledger Entry
                                            </button>
                                        </a>
                                    @endcan
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table data_table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap text-center">ID</th>
                                            <th class="text-nowrap text-center">Transaction No.</th>
                                            <th class="text-center">Job No.</th>
                                            <th class="text-center">Payment Against Bill</th>
                                            <th class="text-nowrap"> Ledger Date </th>
                                            <th class="text-center"> Payment Type </th>
                                            <th class="text-nowrap">Bill Amount</th>
                                            <th class="text-nowrap">Remarks</th>
                                            <th class="text-center">Status</th>
                                            <th width="13%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="search_data">
                                        @foreach ($data as $key => $datum)
                                            <tr>
                                                <td>
                                                    {{ $key + 1 }}
                                                </td>

                                                <td>
                                                    {{ $datum->transaction_no }}
                                                </td>
                                                <td>
                                                    {{ $datum->job_no }}
                                                </td>
                                                <td>
                                                    {{ $datum->payment_against_bill == 'on' ? 'Yes' : 'No' }}
                                                </td>
                                                <td>
                                                    {{ $datum->ledger_date != null ? date('d-m-Y', strtotime($datum->ledger_date)) : '' }}
                                                </td>
                                                <td>
                                                    {{ $datum->payment_type }}
                                                </td>
                                                <td>
                                                    {{ $datum->bill_amount }}
                                                </td>
                                                <td>
                                                    {{ $datum->remarks }}
                                                </td>
                                                <td>
                                                    @if ($datum->deleted_at == null)
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
                                                    {{-- @can('civil-cases-view')

                                                    <a href="{{ route('view-civil-cases', $datum->id) }}">
                                                        <button
                                                            class="btn btn-primary btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Details"><i
                                                                class="fas fa-eye"></i></button>
                                                    </a>
                                                @endcan --}}

                                                    {{-- @can('civil-cases-edit') --}}
                                                        <a href="{{ route('ledger-entry.edit', $datum->id) }}">
                                                            <button class="btn btn-info btn-sm" data-toggle="tooltip"
                                                                data-placement="top" title="Edit"><i
                                                                    class="fas fa-edit"></i></button>
                                                        </a>
                                                    {{-- @endcan
                                                    @can('civil-cases-delete') --}}
                                                        <form method="POST"
                                                            action="{{ route('ledger-entry.destroy', $datum->id) }}"
                                                            class="delete-user btn btn-danger btn-xs">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                                    class="fas fa-trash"></i></button>
                                                        </form>


                                                        {{-- <form method="delete"
                                                          action="{{ route('ledger-entry.destroy', $datum->id) }}"
                                                          class="btn btn-danger btn-xs">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="Delete"><i
                                                                class="fas fa-trash"></i></button>
                                                    </form> --}}
                                                    {{-- @endcan --}}


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
