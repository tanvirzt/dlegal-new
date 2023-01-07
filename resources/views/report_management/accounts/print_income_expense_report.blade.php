@extends('layouts.admin_layouts.admin_layout')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Income Report</h1>

                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>

                            <li class="breadcrumb-item active">Income Report</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <style>
            th {
                background-color: #fff;
            }
        </style>
        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <!-- Main content -->
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
                                    <span id="lblUnitAddress" class="HeaderStyle2">Email:niamulkabir.adv@gmail.com</span>
                                    <span id="lblVoucherType" class="VoucherStyle">
                                </div>

                                <div class="col-sm-4 invoice-col">
                                    <h3 class="text-center">Income Expense Report</h3>

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
                                                        {{ $datum->ledger_head_id != null ? $datum->ledger_head->ledger_head_name : '' }}

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


                            <div class="row mt-5">
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


                    </div>
                </div>
            </div>
        </div>



    </div>
    <script type="text/javascript">
        window.addEventListener("load", window.print());
    </script>

@endsection
