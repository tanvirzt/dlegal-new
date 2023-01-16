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


                        <h4>
                            <img src="http://127.0.0.1:8000/login_assets/img/rsz_11d_legal_logo.png" alt="AdminLTE Logo"
                                class="brand-image" style="opacity:1; padding-left:380px">

                            <small class="float-right" style="font-weight: 600!important;font-size:100%!important;">Date:
                                16-01-2023</small>
                        </h4>
                        <h2 style="font-weight: bold;padding-left:290px;padding-top:20px;">INCOME EXPENSE REPORT</h2>

                    </div>
                    <div class="row invoice-info">
                        <div class="col-sm-6 invoice-col">

                            <span id="lblUnitAddress" style="padding: 10px">
                                @if (!empty($request_data['from_date']))
                                    @if ($request_data['from_date'] != 'dd-mm-yyyy')
                                        <h6 style="font-size: 20px;font-weight:bold">From:
                                            {{ $request_data['from_date'] }},
                                            To: {{ $request_data['to_date'] }}</h6>
                                    @endif
                                @endif
                            </span>
                        </div>
                    </div>


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

            </div>
        </div>


    </div>
@endsection
