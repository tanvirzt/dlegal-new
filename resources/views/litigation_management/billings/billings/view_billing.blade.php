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
                                <a  type="button" href="{{ route('billings') }}" aria-disabled="false"
                                    role="link" tabindex="-1">Back </a>
                            </li>
                        </ol>
                    </div>
                    
                </div>

            </div>

        </div>

        <section class="content" id="section1st">

            <div class="container-fluid py-2">

                <div class="col-md-12">

                <div class="card">
                    
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
                                                            
                                                            {{-- {{ $data->case_no }} --}}
                                                        
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
                                                        {{-- <tr>
                                                            <td>Payment Amount</td>
                                                            <td>{{ $data->payment_amount }}</td>
                                                        </tr> --}}
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
                </div>

                </div>
            </div>
            </section>


    </div>

@endsection




