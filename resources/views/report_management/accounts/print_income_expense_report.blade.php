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

                    <div class="row">
                        <div class="col-10 ">
                            <h4 style="text-align: center; padding-left:100px">
                                <img src="{{ asset('login_assets/img/rsz_11d_legal_logo.png') }}" alt="AdminLTE Logo"
                                    class="brand-image" style="opacity:1">

                                {{-- <b>From</b>  --}}
                            </h4>
                            <h2
                                style="font-weight: bold; text-aling:center;font-size:25px; padding-left:280px;padding-top:30px">
                                INCOME EXPENSE REPORT
                            </h2>
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
@endsection
