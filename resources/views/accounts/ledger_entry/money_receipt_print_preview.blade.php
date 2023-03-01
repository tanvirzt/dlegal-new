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
        .container {
          width: 100%;
          padding-right: 20px;
          padding-left: 20px;
          margin-right: auto;
          margin-left: auto;
          max-width: 100%;
        }

        
        h3.headingBar{
            color: #fff !important;
            background-color: #0CA2A3;    
            text-align: center;
            font-weight: bold;
            padding: 15px 0;
            margin-top: 20px;
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

                <div class="row">
                                        
                        
                    <div class="col-md-12">
                        <div class="col-sm-8" style="float:left;">
                            <img src="{{ asset('login_assets/img/rsz_11d_legal_logo.png') }}" alt="AdminLTE Logo" class="brand-image" style="opacity:1">
                        </div>
                        <div class="col-sm-4" style="float:left;">
                            @if ($data != null)                                
                                    <a href="{{ route('money-receipt-print-preview', $data->id) }}" title="Print Case Info"
                                        target="_blank" class="btn btn-info float-right"><i class="fas fa-print"></i>
                                        Print</a>                                
                            @endif
                        </div>
                    </div>
                        

                    <div class="col-sm-12"><h3 class="headingBar">Invoice</h3></div>
                    <div class="col-sm-12">
                        <div class="col-sm-8" style="float: left;">   

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
                            
                        </address>
                        </div>   
                        <div class="col-sm-4" style="float:left;">
                    
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
                
                <div class="col-sm-12"><h3 class="headingBar">Money Receipt</h3></div>
            </div>    
                <div class="row">
                    
                        <table class="table table-bordered" style="width: 98.7%; margin: 0 auto;">
                            <thead>
                                <tr style="color: #fff;">
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
