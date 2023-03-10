@extends('layouts.admin_layouts.admin_layout')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Ledger Report </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active"> Ledger Report</li>
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
                    <div class="col-md-6">
                        <div class="card">
                            <div id="accordion">
                                <div class="card-header" id="headingTwo">
                                    <h3 class="card-title"> Ledger :: Report

                                        @if (!empty($is_search))
                                            <span style="color: red;font-size:15px;">(Showing:
                                                {{ $request_data['ledger_type'] != null ? 'Ledger Type' : '' }}

                                                )

                                                {{-- {{ !empty($is_search) ? '(Showing)' : '' }} --}}
                                            </span>
                                        @endif

                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn collapsed" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>


                                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                                    data-parent="#accordion">
                                    <div class="card-body">


                                        <form method="get" action="{{ route('ledger-head-report-list-search') }}">
                                            {{-- @csrf --}}
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label for="ledger_type" class="col-sm-4 col-form-label">Ledger
                                                            Type</label>
                                                        <div class="col-sm-8">
                                                            <select name="ledger_type" class="form-control select2"
                                                                id="ledger_type">
                                                                <option value=""> Select </option>
                                                                <option value="Income"
                                                                    {{ old('ledger_type') || $request_data['ledger_type'] == 'Income' ? 'selected' : '' }}>
                                                                    Income </option>
                                                                <option value="Expense"
                                                                    {{ old('ledger_type') || $request_data['ledger_type'] == 'Expense' ? 'selected' : '' }}>
                                                                    Expense </option>
                                                            </select>
                                                            @error('ledger_type')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>



                                            <div class="float-right">
                                                <button type="submit" id="submit"
                                                    class="btn btn-primary text-uppercase"><i class="fas fa-search"></i>
                                                    Search
                                                </button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (!empty($data))
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"> List <span
                                            style="color: red;font-size:15px;">{{ !empty($is_search) ? '(Showing Searched Item)' : '' }}</span>
                                    </h3>
                                    <div class="float-right">

                                        <form method="get" action="{{ route('print-ledger-head-report-list') }}"
                                            target="_blank">
                                            @csrf


                                            <input type="hidden" name="ledger_type"
                                                value="{{ $request_data['ledger_type'] }}">

                                            <button type="submit" class="btn btn-info" data-toggle="tooltip"
                                                data-placement="top" title="Delete"> <i class="fas fa-print"></i> Print
                                            </button>
                                        </form>




                                        {{-- <a href="{{ route('litigation-report-print-preview',['param1'=>$from_date,'param2'=>$to_date]) }}" target="_blank"
                                            class="btn btn-info"><i class="fas fa-print"></i> Print </a> --}}
                                    </div>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    @if (!empty($data))
                                        <div class="invoice p-3 mb-3">

                                            <div class="row">
                                                <div class="col-12">
                                                    <h4>
                                                        <img src="{{ asset('login_assets/img/rsz_11d_legal_logo.png') }}"
                                                            alt="AdminLTE Logo" class="brand-image" style="opacity:1">

                                                        <small class="float-right">Date: {{ date('d-m-Y') }}</small>
                                                    </h4>
                                                </div>

                                            </div>
                                            <br>
                                            <br>
                                            <div class="row invoice-info">
                                                <div class="col-sm-4 invoice-col">
                                                    {{-- <b>From</b>  --}}

                                                    <span id="lblUnitAddress" class="HeaderStyle2">365/B, Modhubag,
                                                        Mogbazar, Hatirjheel, Dhaka - 1217, Bangladesh</span>
                                                    <br />
                                                    <span id="lblUnitAddress" class="HeaderStyle2"> Cell:01717406688
                                                    </span>
                                                    <br />
                                                    <span id="lblUnitAddress" class="HeaderStyle2"> Tel:01717406688
                                                    </span>
                                                    <br />
                                                    <span id="lblUnitAddress"
                                                        class="HeaderStyle2">Email:niamulkabir.adv@gmail.com</span>
                                                    <span id="lblVoucherType" class="VoucherStyle">
                                                </div>

                                                <div class="col-sm-4 invoice-col">
                                                    <h3 class="text-center">Ledger Head Report List</h3>
                                                </div>

                                                <div class="col-sm-4 invoice-col">

                                                </div>

                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                            <br>

                                            <div class="row">
                                                <div class="col-12 table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">SL</th>
                                                                <th class="text-center">Ledger Date</th>
                                                                <th class="text-center">Bill No</th>
                                                                <th class="text-center">Payment Against Bill</th>
                                                                <th class="text-nowrap"> Transaction No. </th>
                                                                <th class="text-center"> Job No. </th>
                                                                <th class="text-nowrap">Ledger Type</th>
                                                                <th class="text-nowrap">Payment Type</th>
                                                                <th class="text-center">Ledger Head Bill</th>
                                                                <th class="text-center">Bill Amount</th>
                                                                <th class="text-center">Income</th>
                                                                <th class="text-center">Expense</th>
                                                                <th class="text-center">Remarks</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
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
                                                                        {{ $datum->job_no }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $datum->ledger_type }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $datum->payment_type }}
                                                                    </td>
                                                                    <td>
                                                                        {{ @$datum->ledger_head_id != null ? @$datum->ledger_head->ledger_head_name : '' }}

                                                                    </td>
                                                                    <td>
                                                                        {{ $datum->bill_amount }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $datum->income_paid_amount }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $datum->expense_paid_amount }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $datum->remarks }}
                                                                    </td>

                                                                </tr>
                                                            @endforeach
                                                            <tr>
                                                                <td colspan="9">Total: </td>
                                                                <td></td>
                                                                <td>{{ $data->sum('income_paid_amount') }}</td>
                                                                <td> {{ $data->sum('expense_paid_amount') }} </td>
                                                                <td> </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-6">

                                                </div>



                                            </div>


                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="text-center">
                                                        <hr width="50%">
                                                        Accountant
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="text-center">
                                                        <hr width="50%">
                                                        Checked By
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="text-center">
                                                        <hr width="50%">
                                                        Received By
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    {{-- <a href="{{ route('billings-print-preview', $data->id) }}" title="Print Case Info" target="_blank"
                                                class="btn btn-info float-right"><i class="fas fa-print"></i> Print</a> --}}
                                                </div>
                                            </div>



                                        </div>
                                    @endif

                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    @endif
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
