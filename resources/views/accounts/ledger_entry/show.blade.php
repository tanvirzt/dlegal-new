@extends('layouts.admin_layouts.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
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

                                    <br><br>
                                    <span id="lblUnitAddress" class="HeaderStyle2 m-1"
                                        style="font-weight: bold;font-size:18px">
                                        Cell:01717406688
                                    </span>
                                    <br />
                                    <span id="lblUnitAddress" class="HeaderStyle2 mt-3"
                                        style="font-weight: bold;font-size:18px;  margin-top: 15px!important;">
                                        Tel:01717406688
                                    </span>
                                    <br />



                                </h4>
                            </div>
                            <div class="col-2">

                                <h3 class="float-right" style="font-weight: bold">Date: {{ date('d-m-Y') }}</h3>
                            </div>
                        </div>

                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">

                                @php
                                    if ($data->client_id != null) {
                                        $client = App\Models\SetupClient::where('id', $data->client_id)->first();
                                    }
                                    
                                @endphp

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


                        </div>

                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table ">

                                    <thead class="tableHeader">
                                        <tr class="tableHeader" style="background: #006DCC">

                                            <th class="text-nowrap text-center"
                                                style="background: #079e8d; color:aliceblue">Ledger Date</th>
                                            <th class="text-center" style="background: #079e8d; color:aliceblue">Bill No
                                            </th>
                                            <th class="text-center" style="background: #079e8d; color:aliceblue">Ledger Head
                                                Bill</th>
                                            <th class="text-center" style="background: #079e8d; color:aliceblue">Bill Amount
                                            </th>

                                            <th class="text-center" style="background: #079e8d; color:aliceblue">Remarks
                                            </th>
                                        </tr>
                                    </thead>
                                    @if ($data != null)
                                        <tbody id="search_data">
                                            {{-- @foreach ($data as $key => $datum) --}}
                                            <tr>


                                                <td class="text-center">
                                                    {{ $data->ledger_date }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $data->bill_id }}
                                                </td>




                                                <td class="text-center">
                                                    {{ $data->ledger_head_name }}

                                                </td>
                                                <td class="text-center">
                                                    {{ $data->bill_amount }}
                                                </td>

                                                <td class="text-center">
                                                    {{ $data->remarks }}
                                                </td>



                                            </tr>
                                            {{-- @endforeach --}}
                                        </tbody>
                                    @endif
                                </table>
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

                    {{-- print document  --}}


                    {{-- <div class="card">

                    <div>
                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="appeal_case_info">

                                        <div class="card">
                                            <div class="card-body">

                                                <table class="table table-bordered">

                                                    <tbody>
                                                    <tr>
                                                        <td width="50%">Bill Type</td>
                                                        <td width="50%"> {{ $data->bill_type_name }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Payment Type</td>
                                                        <td> {{ $data->payment_type }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>District</td>
                                                        <td>{{ $data->district_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Case Type</td>
                                                        <td>{{ $data->case_types_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Case No.</td>
                                                        <td>
                                                            @php

                                                if ($data->class_of_cases == 'District Court') {
                                                    $case = App\Models\CriminalCase::where('id',$data->case_no)->first();
                                                }else if($data->class_of_cases == 'Special Court'){
                                                    $case = App\Models\LabourCase::where('id',$data->case_no)->first();
                                                }else if($data->class_of_cases == 'High Court Division'){
                                                    $case = App\Models\HighCourtCase::where('id',$data->case_no)->first();
                                                }else if($data->class_of_cases == 'Appellate Division'){
                                                    $case = App\Models\AppellateCourtCase::where('id',$data->case_no)->first();
                                                }

                                                @endphp

                                                {{ !empty($case->case_no) ? $case->case_no : '' }}


                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Panel Lawyer</td>
                                                        <td>{{ $data->first_name }} {{ $data->middle_name }} {{ $data->last_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bill Amount</td>
                                                        <td>{{ $data->bill_amount }}</td>
                                                    </tr>



                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>



                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="revision_case_info">

                                        <div class="card">
                                            <div class="card-body">

                                                <table class="table table-bordered">

                                                    <tbody>
                                                        <tr>
                                                            <td>Date of Billing</td>
                                                            <td>{{ $data->date_of_billing }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Bank</td>
                                                            <td>{{ $data->bank_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Branch</td>
                                                            <td>{{ $data->bank_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Cheque No</td>
                                                            <td>{{ $data->cheque_no }}</td>
                                                        </tr>
                                                    <tr>
                                                        <td width="50%">Digital Payment Type</td>
                                                        <td width="50%" colspan="2"> {{ $data->digital_payment_type_name }} </td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <a href="{{ route('billings-print-preview', $data->id) }}" title="Print Case Info" target="_blank"
                                            class="btn btn-info float-right"><i class="fas fa-print"></i> Print</a>

                                    </div>
                                </div>
                            </div>

                        </div>





                    </div>
                </div> --}}

                </div>
            </div>
        </section>


    </div>
@endsection
