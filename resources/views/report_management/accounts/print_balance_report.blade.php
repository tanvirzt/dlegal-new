@extends('layouts.admin_layouts.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Ledger Report</h1>

                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>

                            <li class="breadcrumb-item active">Ledger Report</li>
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
                                    <h3 class="text-center">Ledger Report </h3>
                                    <h5 class="text-center">
                                        {{ !empty($ledger_head_name) ? $ledger_head_name->ledger_head_name : '' }}
                                    </h5>
                                    <h6 class="text-center">
                                        {{ !empty($request_data['class_of_cases']) ? $request_data['class_of_cases'] : '' }}
                                    </h6>
                                    @if (!empty($request_data['class_of_cases']) && $request_data['class_of_cases'] == 'District Court')
                                        <h6 class="text-center">

                                            @php
                                                $case_number = DB::table('ledger_entries')
                                                    ->leftJoin('case_billings', 'ledger_entries.bill_id', 'case_billings.id')
                                                    ->leftJoin('criminal_cases', 'case_billings.case_no', 'criminal_cases.id')
                                                    ->where(['case_billings.class_of_cases' => $request_data['class_of_cases'], 'case_billings.case_no' => $request_data['case_no']])
                                                    ->select('ledger_entries.*', 'case_billings.class_of_cases', 'case_billings.case_no', 'criminal_cases.case_no as main_case_no')
                                                    ->first();
                                                // dd($case_number);
                                            @endphp

                                            {{ $case_number->main_case_no }}
                                        </h6>
                                    @endif
                                    {{-- @if ($request_data['from_date'] != 'dd-mm-yyyy')
                                        <h6 class="text-center">From: {{ $request_data['from_date'] }},
                                            To: {{ $request_data['to_date'] }}</h6>
                                    @endif --}}
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
                                                <th class="text-center">Bill No</th>
                                                <th class="text-nowrap">Payment Type</th>
                                                <th class="text-center">Bill Amount</th>
                                                <th class="text-center">Paid Amount</th>
                                                <th class="text-center">Due Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>



                                            @foreach ($data as $key => $datum)
                                                <tr>
                                                    <td>
                                                        {{ $key + 1 }}
                                                    </td>

                                                    <td>
                                                        {{ $datum->billing_no }}
                                                    </td>

                                                    <td>
                                                        {{ $datum->payment_type }}
                                                    </td>
                                                    <td>
                                                        {{ $datum->bill_amount }}
                                                    </td>
                                                    <td>
                                                        @foreach ($datum->ledger as $ledger)
                                                            {{ $ledger->paid_amount }} <br>
                                                        @endforeach
                                                    </td>



                                                </tr>
                                            @endforeach

                                            <tr>
                                                <td colspan="3">Total: </td>
                                                {{-- <td> {{ $data->sum('bill_amount') }} </td> --}}

                                                <td>


                                                </td>

                                                {{-- <td>{{ $data->sum('bill_amount') - (!empty($is_search) ? $pd_amnt : $ledger->sum('paid_amount')) }}
                                                </td> --}}
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
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto py-4">

                <!--start invoice area-->
                <div class="main-invo">

                    <div class="row">
                        <div class="col-10 ">
                            <h4 style="text-align: center; padding-left:100px">
                                <img src="{{ asset('login_assets/img/rsz_11d_legal_logo.png') }}" alt="AdminLTE Logo"
                                    class="brand-image" style="opacity:1">

                                {{-- <b>From</b>  --}}
                            </h4>
                            <h2
                                style="font-weight: bold; text-aling:center;font-size:25px; padding-left:280px;padding-top:30px">
                                LEDGER REPORT
                            </h2>
                            <h1 class="m-0 text-dark"> Report</h1>
                        </div>
                        <div class="col-2">

                            <h3 class="float-right" style="font-weight: bold">Date: {{ date('d-m-Y') }}</h3>
                        </div>
                    </div>
                    <article>
                        <address>
                            <div class="invoice-customer">

                                <div class="address">
                                    <div class="invoice-self">

                                        <span id="lblUnitAddress" style="padding: 0px">
                                            @if (!empty($request_data['from_date']))
                                                @if ($request_data['from_date'] != 'dd-mm-yyyy')
                                                    <h2 style="font-weight: bold;">From:
                                                        {{ $request_data['from_date'] }},
                                                        To: {{ $request_data['to_date'] }}</h2>
                                                @endif
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </address>


                        <table class="inventory">
                            <thead>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th class="text-center">BILL No</th>

                                    <th class="text-center">Payment Type</th>

                                    <th class="text-center">Bill Amount</th>
                                    <th class="text-center">Paid Amount</th>
                                    <th class="text-center">Due Amount</th>
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
                                            {{ @$datum->ledger_head_id != null ? @$datum->ledger_head->ledger_head_name : '' }}

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
                                    <td colspan="3" style="font-weight: bold">Total: </td>

                                    <td style="font-weight: bold">
                                        {{ $data->sum('income_paid_amount') }}</td>
                                    <td style="font-weight: bold">
                                        {{ $data->sum('expense_paid_amount') }} </td>
                                    <td style="font-weight: bold"> </td>
                                </tr>
                            </tbody>
                        </table>
                        {{-- <article>
                            <div class="invoice-terms">
                                <h4>Terms and Condition</h4>
                                <div class="tc-ol">
                                    <ol>
                                        <li>Write Something ...................................</li>
                                        <li>Write Something ...................................</li>
                                    </ol>
                                </div>
                            </div> --}}


                    </article>
                    </article>
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

                    </div>
                </div>
                <!--end invoice area-->

            </div>
        </div>


    </div>
    <script type="text/javascript">
        window.addEventListener("load", window.print());
    </script>
@endsection
