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
                            <div class="col-12">
                                <h4>
                        <img src="{{ asset('login_assets/img/rsz_11d_legal_logo.png') }}" alt="AdminLTE Logo" class="brand-image" style="opacity:1">

                                    <small class="float-right">Date: {{ date('d-m-Y') }}</small>
                                </h4>
                            </div>

                        </div>

                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <b>From</b> <br>
                                <span id="lblUnitAddress" class="HeaderStyle2">365/B, Modhubag, Mogbazar, Hatirjheel, Dhaka - 1217, Bangladesh</span>
                                        <br/>
                                        <span id="lblUnitAddress" class="HeaderStyle2"> Cell:01717406688 </span>
                                        <br/>
                                        <span id="lblUnitAddress" class="HeaderStyle2"> Tel:01717406688 </span>
                                        <br/>
                                        <span id="lblUnitAddress" class="HeaderStyle2">Email:niamulkabir.adv@gmail.com</span>
                                            <span id="lblVoucherType" class="VoucherStyle">
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <h3 class="text-center">
                                Money Receipt    
                                </h3><br>
                                
                            </div>
                            <div class="col-sm-4 invoice-col">
                               <b>To</b>
                               
                               @php

                                if ($data->bill->class_of_cases == 'District Court') {
                                    $case = App\Models\CriminalCase::where('id',$data->bill->case_no)->first();
                                }else if($data->bill->class_of_cases == 'Special Court'){
                                    $case = App\Models\LabourCase::where('id',$data->bill->case_no)->first();
                                }else if($data->bill->class_of_cases == 'High Court Division'){
                                    $case = App\Models\HighCourtCase::where('id',$data->bill->case_no)->first();
                                }else if($data->bill->class_of_cases == 'Appellate Division'){
                                    $case = App\Models\AppellateCourtCase::where('id',$data->bill->case_no)->first();
                                }

                                @endphp

                                <address>
                                    <strong>{{ $case->client_name_write }}</strong><br>
                                    {{ $case->client_address }}
                                    
                                </address>
                            </div>

                            

                        </div>


                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap text-center">SL</th>
                                            <th class="text-nowrap text-center">Ledger Date</th>
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
                                    <tbody id="search_data">
                                        {{-- @foreach ($data as $key => $datum) --}}
                                            <tr>
                                                <td>
                                                    1
                                                </td>

                                                <td>
                                                    {{ $data->ledger_date != null ? date('d-m-Y', strtotime($data->ledger_date)) : '' }}
                                                </td>
                                                <td>
                                                    {{ $data->bill_id != null ? $data->bill->billing_no : '' }}
                                                </td>
                                                <td>
                                                    {{ $data->payment_against_bill == 'on' ? 'Yes' : 'No' }}
                                                </td>
                                                <td>
                                                    {{ $data->transaction_no }}
                                                </td>
                                                <td>
                                                    {{ $data->job_no }}
                                                </td>
                                                <td>
                                                    {{ $data->ledger_type }}
                                                </td>
                                                <td>
                                                    {{ $data->payment_type }}
                                                </td>
                                                <td>
                                                    {{ $data->ledger_head_bill_id != null ? $data->ledger_head_bill->ledger_head_name : '' }}

                                                </td>
                                                <td>
                                                    {{ $data->bill_amount }}
                                                </td>
                                                <td>
                                                    {{ $data->income_paid_amount }}
                                                </td>
                                                <td>
                                                    {{ $data->expense_paid_amount }}
                                                </td>
                                                <td>
                                                    {{ $data->remarks }}
                                                </td>
                                                

                                                
                                            </tr>
                                        {{-- @endforeach --}}
                                    </tbody>
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
                                                <td>{{ $data->bill_amount }}</td>
                                            </tr>
                                            
                                            <tr>
                                                <th>Total:</th>
                                                <td>{{ $data->bill_amount }}</td>
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
                            {{-- <div class="col-md-12">
                                <a href="{{ route('money-receipt-print-preview', $data->id) }}" title="Print Case Info" target="_blank"
                                    class="btn btn-info float-right"><i class="fas fa-print"></i> Print</a>
                            </div> --}}
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

    <script type="text/javascript"> 
        window.addEventListener("load", window.print());
      </script>
@endsection
