@extends('layouts.admin_layouts.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Billings</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active">Billings</li>
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
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                {{ Session::get('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">List</h3>
                                <div class="float-right">
                                    <a href="{{ route('add-billing') }}"><button
                                            class="btn btn-sm
                                    btn-success add_btn"><i
                                                class="fas fa-plus"></i> Add Billings </button></a>
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="data_table" class="table dataTable no-footer dtr-inline">
                                    <thead>
                                        <tr>
                                            <th class="text-center text-nowrap">ID</th>
                                            <th class="text-center text-nowrap">Billing</th>
                                            <th class="text-center text-nowrap">Bill Type</th>
                                            <th class="text-center text-nowrap">Payment Type</th>
                                            <th class="text-center text-nowrap">Case No</th>
                                            <th class="text-center text-nowrap">Bill Amount</th>
                                            <th class="text-center text-nowrap">Date of Billing</th>
                                            <th class="text-center text-nowrap">Paid Amount</th>
                                            <th class="text-center text-nowrap">Status</th>
                                            <th class="text-center text-nowrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $datum)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $key + 1 }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $datum->billing_no }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $datum->bill_type_name }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $datum->payment_type }}
                                                </td>
                                                <td class="text-center">
                                                    @php
                                                        
                                                        if ($datum->class_of_cases == 'District Court') {
                                                            $case = App\Models\CriminalCase::where('id', $datum->case_no)->first();
                                                        } elseif ($datum->class_of_cases == 'Special Court') {
                                                            $case = App\Models\CriminalCase::where('id', $datum->case_no)->first();
                                                        } elseif ($datum->class_of_cases == 'High Court Division') {
                                                            $case = App\Models\HighCourtCase::where('id', $datum->case_no)->first();
                                                        } elseif ($datum->class_of_cases == 'Appellate Division') {
                                                            $case = App\Models\AppellateCourtCase::where('id', $datum->case_no)->first();
                                                        }
                                                        // dd($case);
                                                    @endphp

                                                    {{ !empty($case->case_no) ? $case->case_no : '' }}

                                                    {{ !empty($case->case_infos_case_no) ? $case->case_title_name . ' ' . $case->case_infos_case_no . '/' . $case->case_infos_case_year : '' }}
                                                    {{-- {{$datum->case_no}} --}}
                                                </td>
                                                <td class="text-center">
                                                    {{ $datum->bill_amount }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $datum->date_of_billing }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $datum->payment_amount }}
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
                                                    <a href="{{ route('add-ledger-entry', $datum->id) }}"><button
                                                            class="btn btn-info btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Add Ledger"><i
                                                                class="fas fa-money-bill"></i></button></a>

                                                    <a href="{{ route('view-billing', $datum->id) }}"><button
                                                            class="btn btn-info btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="View"><i
                                                                class="fas fa-eye"></i></button></a>
                                                    <a href="{{ route('edit-billings', $datum->id) }}"><button
                                                            class="btn btn-info btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Edit"><i
                                                                class="fas fa-edit"></i></button></a>
                                                    <form method="POST" action="{{ route('delete-billing', $datum->id) }}"
                                                        class="delete-user btn btn-danger btn-xs">
                                                        @csrf
                                                        {{-- @method('DELETE') --}}

                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                                class="fas fa-trash"></i> </button>
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
@endsection
