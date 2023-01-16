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


        <div class="row">
            <div class="col-md-8 mx-auto py-4">

                <!--start invoice area-->
                <div class="main-invo">
                    <div class="invoice-header">
                        <div class="invoice-logo" style="overflow: hidden; margin-bottom: 15px;">
                            <img src="{{ asset('login_assets/img/rsz_11d_legal_logo.png') }}" alt="image"
                                class="brand-image" style="opacity:1">
                        </div>
                        <h1>Income Expense Report</h1>
                        <div class="address">
                            <div class="invoice-self">
                                <p><strong>From</strong></p>
                                <p>365/B, Modhubag, Mogbazar, Hatirjheel, Dhaka
                                    - 1217, Bangladesh</p>
                                <p>Cell: 01717406688 </p>
                                <p>Tel: 01717406688 </p>
                                <p>Email: niamulkabir.adv@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <article>
                        <address>
                            <div class="invoice-customer">
                                <h5>Customer</h5>
                                {{-- @php
                                    if ($data->client_id != null) {
                                        $client = App\Models\SetupClient::where('id', $data->client_id)->first();
                                    }
                                    
                                @endphp

                                <address>
                                    <strong>{{ $case->client_name }}</strong><br>
                                    {{ $client->client_address }}

                                </address> --}}
                            </div>
                        </address>

                        <div class="meta-box">
                            <table class="meta">

                                <tr>
                                    <th>DATE</th>
                                    <td>{{ date('d-m-Y') }}</td>
                                </tr>
                                <tr>
                                    <th>INVOICE NO</th>
                                    {{-- <td>{{ $data->billing_no }}</td> --}}
                                </tr>
                                <tr>
                                    <th>CASE NO</th>
                                    {{-- <td>{{ $case->case_no }}</td> --}}
                                </tr>
                            </table>
                        </div>
                        <div class="col-2">

                        <table class="inventory">
                            <thead>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th class="text-center">Transaction Date</th>






                                    <th class="text-center">Ledger Head Bill</th>

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
                                    <td colspan="2">Total: </td>
                                    <td></td>
                                    <td>{{ $data->sum('income_paid_amount') }}</td>
                                    <td> {{ $data->sum('expense_paid_amount') }} </td>
                                    <td> </td>
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
                        <table class="meta">
                            <tr>
                                <th>Total Income</th>
                                <td>{{ $data->sum('income_paid_amount') }}</td>
                            </tr>
                            <tr class="total-border"></tr>
                            <tr class="invo-total-price">
                                <th>Total Expense</th>
                                <td> {{ $data->sum('expense_paid_amount') }}</td>
                            </tr>
                        </table>


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
@endsection
