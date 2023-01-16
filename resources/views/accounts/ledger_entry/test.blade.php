@extends('layouts.admin_layouts.admin_layout')
@section('content')
<<<<<<< HEAD
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
            margin-left: 260px;
            width: 960px;
        }
    </style>
=======
>>>>>>> 95bd4ad1629f66cda006c2a57b1b88ab20e9dcf5
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
<<<<<<< HEAD
        @php
            if ($data->client_id != null) {
                $client = App\Models\SetupClient::where('id', $data->client_id)->first();
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
                    {{-- @php
                        dd($data);
                    @endphp --}}
                    @if ($data != null)
                        <div class="col-md-12 m-5 p-0">
                            <a href="{{ route('money-receipt-print-preview', $data->id) }}" title="Print Case Info"
                                target="_blank" class="btn btn-info float-right"><i class="fas fa-print"></i>
                                Print</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
=======
        <section class="content" id="section1st">

            <div class="container-fluid py-2">

                <div class="col-12">

                    {{-- print document  --}}

                    <div class="invoice p-3 mb-3">

                        <div class="row">
                            <div class="col-10">
                                <h4 style="text-align: center">
                                    <img src="{{ asset('login_assets/img/rsz_11d_legal_logo.png') }}" alt="AdminLTE Logo"
                                        class="brand-image" style="opacity:1">

                                    {{-- <b>From</b>  --}}




                                </h4>
                                <h2
                                    style="font-weight: bold; text-aling:center;font-size:25px;color: #079e8d; padding-left:500px">
                                    Money
                                    Receipt</h2>
                            </div>
                            <div class="col-2">

                                <h3 class="float-right" style="font-weight: bold">Date: {{ date('d-m-Y') }}</h3>
                            </div>
                        </div>
                        @php
                            if ($data->client_id != null) {
                                $client = App\Models\SetupClient::where('id', $data->client_id)->first();
                            }
                            
                        @endphp
                        {{-- <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">

                           

                                <address>
                                    <h2 style="font-weight: bold;font-size:25px;color: #079e8d;">Money Receipt</h2>
                                    <b style="font-weight: bold;font-size:15px">Invoice No :</b>
                                    <strong
                                        style="font-weight: bold;font-size:15px">{{ $data->transaction_no }}</strong><br>
                                    <b style="font-weight: bold;font-size:15px">Client :</b>
                                    <strong style="font-weight: bold;font-size:15px">{{ $client->client_name }}</strong><br>

                                    <b style="font-weight: bold;font-size:15px">Address :</b> <strong id="lblUnitAddress"
                                        class="HeaderStyle2" style="font-weight: bold;font-size:15px">
                                        {{ $client->client_address }}</strong><br>
                                    <b style="font-weight: bold;font-size:15px">Email :</b><strong id="lblUnitAddress"
                                        class="HeaderStyle2" style="font-weight: bold;font-size:18px">
                                        {{ $client->client_email }}</strong><br>
                                    <b style="font-weight: bold;font-size:15px">Phone :</b><strong id="lblVoucherType"
                                        class="VoucherStyle"
                                        style="font-weight: bold;font-size:15px">{{ $client->client_mobile }}</strong>
                                </address>

                            </div>

                            @php
                                $case = DB::table('case_billings')
                                    ->where('case_no', $data->id)
                                    ->first();
                            @endphp
                            @if ($case != null)
                                <div class="col-sm-4 invoice-col">
                                    <b>To</b>

                                    @php
                                        
                                        if ($case->class_of_cases == 'District Court') {
                                            $case = App\Models\CriminalCase::where('id', $case->case_no)->first();
                                        } elseif ($case->class_of_cases == 'Special Court') {
                                            $case = App\Models\CriminalCase::where('id', $case->case_no)->first();
                                        } elseif ($case->class_of_cases == 'High Court Division') {
                                            $case = App\Models\HighCourtCase::where('id', $case->case_no)->first();
                                        } elseif ($case->class_of_cases == 'Appellate Division') {
                                            $case = App\Models\AppellateCourtCase::where('id', $case->case_no)->first();
                                        }
                                        
                                    @endphp


                                </div>
                            @endif


                        </div> --}}
                        <div class="container-fluid">
                            <div class="card p-5 m-5">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Client Name</label>
                                            <input type="text" class="form-control" id="inputEmail4"
                                                value="{{ $client->client_name }}" disabled>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Paid Amount</label>
                                            <input type="text" class="form-control" value="{{ $data->paid_amount }}"
                                                placeholder="Password" disabled>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress">Bill Amount</label>
                                            <input type="text" class="form-control" value="{{ $data->bill_amount }}"
                                                disabled>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Payment Type</label>
                                            <input type="text" class="form-control" value="{{ $data->payment_type }}"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress">Invoice Number</label>
                                            <input type="text" class="form-control" value="{{ $data->transaction_no }}"
                                                disabled>
                                        </div>

                                    </div>


                                </form>

                            </div>
                        </div>
                        <div class="row">

                            <div class="col-6">

                            </div>

                            <div class="col-6">
                                {{-- <p class="lead">Amount Due 2/22/2014</p> --}}
                                <div class="table-responsive mt-2">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th style="width:50%">Subtotal:</th>
                                                <td>{{ @$data->bill_amount }}</td>
                                            </tr>

                                            <tr>
                                                <th>Total:</th>
                                                <td>{{ @$data->bill_amount }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
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
                            @if ($data != null)
                                <div class="col-md-12">
                                    <a href="{{ route('money-receipt-print-preview', $data->id) }}" title="Print Case Info"
                                        target="_blank" class="btn btn-info float-right"><i class="fas fa-print"></i>
                                        Print</a>
                                </div>
                            @endif
                        </div>



                    </div>



                </div>
            </div>
        </section>

>>>>>>> 95bd4ad1629f66cda006c2a57b1b88ab20e9dcf5
    </div>
@endsection
