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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>

                            <li class="breadcrumb-item active">Billing</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="card">
                    <div>
                        {{-- <div class="card-header">
                            <style>
                                .data td, th, .data{
                                    border: 1px solid #eeeeee;
                                }
                                .data th{
                                    font-weight: 600;
                                    background: #d3d3d3;
                                }
                            </style>
                            <table style="width: 100%;z-index:99;" width="100%">

                                <tr>


                                    <td style="text-align: center; width:100%;" valign="top">


                                        <span id="lblUnitName" class="HeaderStyle"><b>dLegal</b></span>
                                        <br/>
                                        <span id="lblUnitAddress" class="HeaderStyle2">365/B, Modhubag, Mogbazar, Hatirjheel, Dhaka - 1217, Bangladesh</span>
                                        <br/>
                                        <span id="lblUnitAddress" class="HeaderStyle2"> Cell:01717406688 </span>
                                        <br/>
                                        <span id="lblUnitAddress" class="HeaderStyle2"> Tel:01717406688 </span>
                                        <br/>
                                        <span id="lblUnitAddress" class="HeaderStyle2">Email:niamulkabir.adv@gmail.com</span>
                                            <span id="lblVoucherType" class="VoucherStyle">
                                        <br/>
                                            
                                        <br/>

                                    </td>

                                </tr>
                            </table>

                        </div> --}}

                        <div class="invoice p-3 mb-3">

                            <div class="row mt-3">
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
                                    <h3 class="text-center">Bill</h3><br>
                                    
                                </div>
                                <div class="col-sm-4 invoice-col">
                                   <b>To</b>
                                   
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
                                                <th>Case No</th>
                                                <th>Bill No.</th>
                                                <th>Bill Type</th>
                                                <th>Payment Type</th>
                                                <th>District</th>
                                                <th>Case Type</th>
                                                <th>Class of Cases</th>
                                                <th>Panel Lawyer</th>
                                                {{-- <th>Digital Payment Type</th> --}}
                                                <th>Bill Amount</th>
                                                <th>Date of Billing</th>
                                                <th>Name of Bank</th>
                                                <th>Branch</th>
                                                <th>Cheque No.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <tr>
                                                <td>{{ $case->case_no }}</td>
                                                <td>{{ $data->billing_no }}</td>
                                                <td> {{ $data->bill_type_name }} </td>
                                                <td>{{ $data->payment_type }}</td>
                                                <td> {{ $data->district_name }} </td>
                                                <td> {{ $data->case_types_name }} </td>
                                                <td> {{ $data->class_of_cases }} </td>
                                                <td> {{ $data->first_name }} {{ $data->middle_name }} {{ $data->last_name }} </td>
                                                {{-- <td> {{ $data->digital_payment_type_name }} </td> --}}
                                                <td> {{ $data->bill_amount }} </td>
                                                <td> {{ $data->date_of_billing }} </td>
                                                <td> {{ $data->bank_name }} </td>
                                                <td> {{ $data->bank_branch_name }} </td>
                                                <td> {{ $data->cheque_no }} </td>
    
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
    
                            </div>
    
                            <div class="row">
    
                                <div class="col-6">
                                    
                                </div>
    
                                <div class="col-6">
                                    {{-- <p class="lead">Amount Due 2/22/2014</p> --}}
                                    <div class="table-responsive mt-3">
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
                            </div>
    
    
    
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




