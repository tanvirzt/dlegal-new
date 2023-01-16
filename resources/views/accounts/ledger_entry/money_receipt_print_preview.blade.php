@extends('layouts.admin_layouts.admin_layout')
@section('content')
    <style>
        .invoice-head td {
            padding: 0 8px;
        }

        .span4 {
            width: 400px;
        }

        .span8 {
            width: 800px;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            background-color: transparent;
        }

        .invoice-body {
            background-color: transparent;
        }

        .row {
            margin-left: -20px;
            *zoom: 1;
        }

        .container {

            width: 100%;
            padding-top: 50px;
            padding-right: 7.5px;
            padding-left: 100px;
            margin-right: auto;
            margin-left: auto;
        }

        .well {
            min-height: 40px;
            padding: 19px;
            margin-bottom: 20px;
            background-color: #f5f5f5;
            border: 1px solid #e3e3e3;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 5%);
            -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
            box-shadow: inset 0 1px 1px rgb(0 0 0 / 5%);
        }

        .invoice-body {
            background-color: transparent;
        }

        .invoice-thank {
            margin-top: 60px;
            padding: 5px;
        }

        address {
            margin-top: 15px;
            font-size: 20px;
            font-weight: bold;
        }

        .card {
            padding-left: 0px;
            margin-top: 30px;
            margin-left: 100px;
            width: 960px;
        }
    </style>
    <div class="content-wrapper pb-5">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Billing</h1>

                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a type="button" href="{{ route('billings') }}" aria-disabled="false" role="link"
                                    tabindex="-1">Back </a>
                            </li>
                        </ol>
                    </div>

                </div>

            </div>

        </div>
        @php
            if (@$data->client_id != null) {
                @$client = App\Models\SetupClient::where('id', $data->client_id)->first();
            }
            
        @endphp
        <div class="card">
            <div class="container">

                <div class="row" style="align-items: center">
                    <div class="span4">
                        <img src="{{ asset('login_assets/img/rsz_11d_legal_logo.png') }}" alt="AdminLTE Logo"
                            class="brand-image" style="opacity:1">
                        <address>
                            <span id="lblUnitAddress" class="HeaderStyle2" style="font-size: 15px">365/B, Modhubag,
                                Mogbazar, Hatirjheel, Dhaka - 1217, Bangladesh</span>
                            <br />
                            <span id="lblUnitAddress" class="HeaderStyle2" style="font-size: 15px"> Cell:01717406688
                            </span>
                            <br />
                            <span id="lblUnitAddress" class="HeaderStyle2" style="font-size: 15px"> Tel:01717406688
                            </span>
                            <br />
                            <span id="lblUnitAddress" class="HeaderStyle2"
                                style="font-size: 15px">Email:niamulkabir.adv@gmail.com</span>
                            <span id="lblVoucherType" class="VoucherStyle">
                        </address>
                    </div>
                    <div class="span4 well">
                        <table class="invoice-head">
                            <tbody>
                                <tr>
                                    <td class="pull-right"><strong>CLient #</strong></td>
                                    <td>{{ @$client->client_name }}</td>
                                </tr>
                                <tr>
                                    <td class="pull-right"><strong>Transaction No #</strong></td>
                                    <td>{{ $data->transaction_no }}</td>
                                </tr>
                                <tr>
                                    <td class="pull-right"><strong>Date #</strong></td>
                                    <td> {{ date('d-m-Y') }}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row pt-5 pb-2">
                    <div class="span8" style="  text-transform: uppercase; Font-weight:bold;color: #079e8d;">
                        <h2>Money Receipt</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="span8 well invoice-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Service</th>
                                    <th>Description</th>
                                    <th>Payment Type</th>
                                    <th>Bill Amount</th>
                                    <th>Paid Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $data->ledger_head->ledger_head_name }}</td>
                                    <td></td>
                                    <td>{{ $data->payment_type }}</td>
                                    <td>{{ $data->bill_amount }}</td>
                                    <td>{{ $data->paid_amount }}</td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
                                </tr>
                                <tr>
                                    <td colspan="3">&nbsp;</td>
                                    <td><strong>Total</strong></td>
                                    <td><strong>{{ @$data->bill_amount }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row p-5 m-5">
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
    <script type="text/javascript">
        window.addEventListener("load", window.print());
    </script>
@endsection
