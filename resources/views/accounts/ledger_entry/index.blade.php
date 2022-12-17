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
                                <table id="data_table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap text-center">SL</th>
                                            <th class="text-nowrap text-center">Ledger Date</th>
                                            <th class="text-center">Bill No</th>
                                            <th class="text-center">Payment Against Bill</th>
                                            <th class="text-nowrap"> Transaction No. </th>
                                            <th class="text-center"> Job Name </th>
                                            <th class="text-nowrap">Ledger Category</th>
                                            <th class="text-nowrap">Payment Type</th>
                                            <th class="text-center">Ledger Head</th>
                                            <th class="text-center">Bill Amount</th>
                                            <th class="text-center">Amount</th>
                                            {{-- <th class="text-center">Expense</th> --}}
                                            <th class="text-center">Remarks</th>
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
                                                    {{ $datum->ledger_date != null ? date('d-m-Y', strtotime($datum->ledger_date)) : '' }}
                                                </td>
                                                <td>
                                                    {{ $datum->bill_id != null ? $datum->bill->billing_no : '' }}
                                                </td>
                                                <td>
                                                    {{ $datum->payment_against_bill == 'on' ? 'Yes' : 'No' }}
                                                </td>
                                                <td>
                                                    {{ $datum->transaction_no }}
                                                </td>
                                                <td>
                                                    {{ $datum->job_name }}
                                                </td>
                                                <td>
                                                    {{ $datum->ledger_category_id }}
                                                </td>
                                                <td>
                                                    {{ $datum->payment_type }}
                                                </td>
                                                <td>
                                                    {{ @$datum->ledger_head->ledger_head_name }}

                                                </td>
                                                <td>
                                                    {{ $datum->bill_amount }}
                                                </td>
                                                <td>
                                                    {{ $datum->paid_amount }}
                                                </td>
                                                {{-- <td>
                                                    {{ $datum->expense_paid_amount }}
                                                </td> --}}
                                                <td>
                                                    {{ $datum->remarks }}
                                                </td>


                                                <td>

                                                <a href="{{ route('view-money-receipt',$datum->id) }}"><button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Money Receipt"
                                                    ><i class="fas fa-eye"></i></button></a>
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
