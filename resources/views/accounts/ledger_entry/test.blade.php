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
            margin-left: 260px;
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

    <div class="content-wrapper">
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
            if ($data->client_id != null) {
                $client = App\Models\SetupClient::where('id', $data->client_id)->first();
            }
            
        @endphp


        <div class="">
            <div class="container">

                <div class="row" style="align-items: center">

                    <div class="col-md-12">
                        <div class="col-sm-8" style="float:left;">
                            <img src="{{ asset('login_assets/img/rsz_11d_legal_logo.png') }}" alt="dminLTE Logo" class="brand-image" style="opacity:1">
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
                                <h3 style="font-weight: bold;">From</h3>
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
                        
                        <div class="col-sm-4" style="float: left;">
                            <address>
                                <table class="" style="font-size:15px;">
                                    <tbody>
                                        <tr>
                                            <td class="pull-right">Invoice No. :</td>
                                            <td> {{ $data->transaction_no }}</td>
                                        </tr> 
                                        <tr>
                                            <td class="pull-right">Date :</td>
                                            <td> {{ date('d-m-Y') }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </address>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="col-sm-8" style="float: left; padding: 30px 0 0 0;" > 
                            <h2 style="color: #fff !important; background-color: #0CA2A3; text-align: center; padding: 10px; width: auto; padding: 4px; width: 200px !important; font-size: 20px;">Customer</h2>                           
                            <address>                                
                                <span id="lblUnitAddress" class="HeaderStyle2" style="font-size: 15px">{{ @$client->client_name }}</span>
                                <br />
                                <span id="lblUnitAddress" class="HeaderStyle2" style="font-size: 15px"> Teansaction No. {{ $data->transaction_no }}
                                </span>
                                <br />
                                <span id="lblUnitAddress" class="HeaderStyle2" style="font-size: 15px"> Date: {{ date('d-m-Y') }}
                                </span>
                              
                            </address>
                          
                        </div>
                        
                        <div class="col-sm-4" style="float: left; padding:30px 0 0 0;">

                              <table class="invoice-head">
                                    <tbody>
                                        <tr>
                                            <td class="pull-right"><strong>Class #</strong></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="pull-right"><strong>Category #</strong></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="pull-right"><strong>Bill Period #</strong></td>
                                            <td> </td>
                                        </tr>

                                    </tbody>
                                </table>
                                
                            
                        </div>
                    </div>
                        

                    </div>
                        
                    
                <div class="row pt-5 pb-2">
                    <div class="span8" style="  text-transform: uppercase; Font-weight:bold;color: #079e8d;">
                        <h2>Money Receipt</h2>
                    </div>
                </div>
                <div class="row ">
                    <div class="" style="width:100%">
                        <table class="table table-bordered">
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
                                    <td>{{ @$data->ledger_head->ledger_head_name }}</td>
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
                                    <td><strong>{{ @$data->bill_amount - @$data->paid_amount }}</strong></td>
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
                    {{-- @php
                        dd($data);
                    @endphp --}}
                    
                </div>
                
            </div>
        </div>

    </div>
@endsection
