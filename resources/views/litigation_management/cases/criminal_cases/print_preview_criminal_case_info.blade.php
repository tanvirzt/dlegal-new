@extends('layouts.admin_layouts.admin_layout')
@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Billings Log</h1>

                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>

                            <li class="breadcrumb-item active">Billings Log</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="card">
                    <div>
                        <div class="card-header">
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


                                        <span id="lblUnitName" class="HeaderStyle"><b>DLegal</b></span>
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
                                            <u><span style="padding: 5px;">Criminal Case No. 
                                            
                                                {{ $data->case_infos_case_no ? $data->case_infos_case_title_name.' '.$data->case_infos_case_no.' of '.$data->case_infos_case_year : '' }}@if ($data->sub_seq_case_title_name != null),
                                                @endif
                                                {{ $data->sub_seq_case_title_name }}
                                                @php
                                                    $case_infos_sub_seq_case_no = explode(', ',trim($data->case_infos_sub_seq_case_no));
                                                    $key = array_key_last($case_infos_sub_seq_case_no);
                                                    echo $case_infos_sub_seq_case_no[$key];
                
                                                    $case_infos_sub_seq_case_year = explode(', ',trim($data->case_infos_sub_seq_case_year));
                                                    $key = array_key_last($case_infos_sub_seq_case_year);
                                                    $last_case_no = $case_infos_sub_seq_case_year[$key];
                                                    if ($last_case_no != null) {
                                                        echo ' of '.$last_case_no;
                                                    }
                                                @endphp                                            
                                            
                                            
                                            </span></u>
                                        <br/>

                                    </td>

                                </tr>
                            </table>

                        </div>

                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6">

                                    <div class="appeal_case_info">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="text-uppercase text-bold"><u> Basic Information </u>
                                                    
                                                </h6>
                                                <table class="table table-bordered">

                                                    <tbody>
                                                    <tr>
                                                        <td width="50%">ID</td>
                                                        <td width="50%"> {{ $data->id }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Client Name</td>
                                                        <td> {{ $data->client }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Legal Issue</td>
                                                        <td>{{ $data->legal_issue_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Legal Service</td>
                                                        <td>{{ $data->legal_service_name }} {{ $data->legal_service_write }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Complainant/Informant Name</td>
                                                        <td>{{ $data->complainant_name }} {{ $data->complainant_informant_write }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Accused Name</td>
                                                        <td>{{ $data->accused_name }} {{ $data->accused_write }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>In favour of</td>
                                                        <td> {{ $data->in_favour_of_name }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Case No.</td>
                                                        <td>{{ $data->case_no }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Name of the Court</td>
                                                        <td> {{ $data->court_name }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Next Date</td>
                                                        <td>{{ date('d-m-Y', strtotime($data->next_date)) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Next date fixed for</td>
                                                        <td> {{ $data->next_date_reason_name }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Received Date</td>
                                                        <td>{{ date('d-m-Y', strtotime($data->received_date)) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mode of Receipt</td>
                                                        <td>{{ $data->mode_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Referrer Name</td>
                                                        <td>{{ $data->referrer_name }} {{ $data->referrer_write }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Referrer Details</td>
                                                        <td>{{ $data->referrer_details }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Received By</td>
                                                        <td>{{ $data->name }} {{ $data->received_by_write }}</td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                                <h6 class="text-uppercase text-bold mt-3"><u> Case File Location </u>
                                                </h6>
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td>Cabinet Name</td>
                                                            <td>{{ $data->cabinet_name }} @if($data->self_number) ({{ $data->self_number }}) @endif</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="text-uppercase text-bold"><u> Client Information </u>
                                                    
                                                </h6>
                                                <table class="table table-bordered">

                                                    <tbody>
                                                    <tr>
                                                        <td width="50%">Client(Which Party)</td>
                                                        <td width="50%"> {{ $data->client_party_name }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Client Category</td>
                                                        <td> {{ $data->client_category_name }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Client Subcategory</td>
                                                        <td>{{ $data->client_subcategory_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Client Name</td>
                                                        <td>
                                                            @php
                                                                $client_explode = explode(', ',$data->client_id);
                                                            @endphp
                                                            @if($data->client_id)
                                                                @if (count($client_explode)> 1)
                                                                    @foreach ($client_explode as $pro)
                                                                        <li class="text-left">{{ $pro }}</li>
                                                                    @endforeach
                                                                @else
                                                                    @foreach ($client_explode as $pro)
                                                                        {{ $pro }}
                                                                    @endforeach
                                                                @endif
                                                            @endif

                                                            @php
                                                                $client_name_write = explode(', ',$data->client_name_write);
                                                            @endphp
                                                            @if($data->client_name_write)
                                                                @if (count($client_name_write)> 1)
                                                                    @foreach ($client_name_write as $pro)
                                                                        <li class="text-left">{{ $pro }}</li>
                                                        @endforeach
                                                        @else
                                                            @foreach ($client_name_write as $pro)
                                                                {{ $pro }}
                                                            @endforeach
                                                        @endif
                                                        @endif

                                                    </tr>
                                                    <tr>
                                                        <td>Client Business Name</td>
                                                        <td>{{ $data->client_business_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Client Address</td>
                                                        <td>{{ $data->client_address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Client Mobile</td>
                                                        <td>{{ $data->client_mobile }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Client Email</td>
                                                        <td>{{ $data->client_email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Profession/Type</td>
                                                        <td>{{ $data->profession_name }} {{ $data->client_profession_write }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Zone/Division</td>
                                                        <td>{{ $data->client_division_name }} {{ $data->client_divisoin_write }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Area/District</td>
                                                        <td>{{ $data->client_district_name }} {{ $data->client_district_write }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Branch/Thana</td>
                                                        <td>{{ $data->client_thana_name }} {{ $data->client_thana_write }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Representative Name</td>
                                                        <td>{{ $data->client_representative_name }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Representative Details</td>
                                                        <td>{{ $data->client_representative_details }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Coordinator/Tadbirkar</td>
                                                        <td>{{ $data->coordinator_name }} {{ $data->coordinator_tadbirkar_write }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Coordinator Details</td>
                                                        <td>{{ $data->client_coordinator_details }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="text-uppercase text-bold"><u> OPPOSITE PARTY INFORMATION </u>
                                                    
                                                </h6>
                                                <table class="table table-bordered">

                                                    <tbody>
                                                    <tr>
                                                        <td width="50%">Opposition(Which Party)</td>
                                                        <td width="50%"> {{ $data->oppsition_party_name }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Opposition Category</td>
                                                        <td> {{ $data->opposition_category_name }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Opposition Subcategory</td>
                                                        <td>{{ $data->opposition_subcategory_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Opposition Name</td>
                                                        <td>
                                                            @php
                                                                $opposition_id = explode(', ',$data->opposition_id);
                                                            @endphp
                                                            @if($data->opposition_id)
                                                                @if (count($opposition_id)> 1)
                                                                    @foreach ($opposition_id as $pro)
                                                                        <li class="text-left">{{ $pro }}</li>
                                                                    @endforeach
                                                                @else
                                                                    @foreach ($opposition_id as $pro)
                                                                        {{ $pro }}
                                                                    @endforeach
                                                                @endif
                                                            @endif
                                                            @php
                                                                $opposition_write = explode(', ',$data->opposition_write);
                                                            @endphp
                                                            @if($data->opposition_write)
                                                                @if (count($opposition_write)> 1)
                                                                    @foreach ($opposition_write as $pro)
                                                                        <li class="text-left">{{ $pro }}</li>
                                                                    @endforeach
                                                                @else
                                                                    @foreach ($opposition_write as $pro)
                                                                        {{ $pro }}
                                                                    @endforeach
                                                                @endif
                                                            @endif

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Opposition Business Name</td>
                                                        <td>{{ $data->opposition_business_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Opposition Address</td>
                                                        <td>{{ $data->opposition_address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Opposition Mobile</td>
                                                        <td>{{ $data->opposition_mobile }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Opposition Email</td>
                                                        <td>{{ $data->opposition_email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Profession/Type</td>
                                                        <td>{{ $data->opposition_profession_name }} {{ $data->opposition_profession_write }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Zone/Division</td>
                                                        <td>{{ $data->opposition_division_name }} {{ $data->opposition_divisoin_write }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Area/District</td>
                                                        <td>{{ $data->opposition_district_name }} {{ $data->opposition_district_write }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Branch/Thana</td>
                                                        <td>{{ $data->opposition_thana_name }} {{ $data->opposition_thana_write }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Representative Name</td>
                                                        <td>{{ $data->opposition_representative_name }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Representative Details</td>
                                                        <td>{{ $data->opposition_representative_details }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Coordinator/Tadbirkar</td>
                                                        <td>{{ $data->opposition_coordinator_name }} {{ $data->opposition_coordinator_tadbirkar_write }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Coordinator Details</td>
                                                        <td>{{ $data->opposition_coordinator_details }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="text-uppercase text-bold"><u> Documents
                                                        Received </u>
                                                    
                                                </h6>
                                                
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td width="40%">
                                                                @php
                                                                    $received_documents_id = explode(', ', rtrim($data->received_documents_id, ', '));
                                                                @endphp
                                                                @if($data->received_documents_id)
                                                                    @if (count($received_documents_id)> 1)
                                                                        @foreach ($received_documents_id as $pro)
                                                                            <p>{{ $pro }}</p>
                                                                        @endforeach
                                                                    @else
                                                                        @foreach ($received_documents_id as $pro)
                                                                            {{ $pro }}
                                                                        @endforeach
                                                                    @endif
                                                                @endif
                                                            </td>
                                                            <td width="40%">
                                                                @php
                                                                    $received_documents = explode(', ', rtrim($data->received_documents, ', '));
                                                                @endphp
                                                                @if($data->received_documents)
                                                                    @if (count($received_documents)> 1)
                                                                        @foreach ($received_documents as $pro)
                                                                            <p>{{ $pro }}</p>
                                                                        @endforeach
                                                                    @else
                                                                        @foreach ($received_documents as $pro)
                                                                            {{ $pro }}
                                                                        @endforeach
                                                                    @endif
                                                                @endif
                                                            </td>
                                                            <td width="20%"> 
                                                                @php
                                                                    $received_documents_date = explode(', ', rtrim($data->received_documents_date, ', '));
                                                                @endphp
                                                                @if($data->received_documents_date)
                                                                    @if (count($received_documents_date)> 1)
                                                                        @foreach ($received_documents_date as $pro)
                                                                            <p>{{ date('d-m-Y', strtotime($pro)) }}</p>
                                                                        @endforeach
                                                                    @else
                                                                        @foreach ($received_documents_date as $pro)
                                                                            {{ date('d-m-Y', strtotime($pro)) }}
                                                                        @endforeach
                                                                    @endif
                                                                @endif    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <h6 class="text-uppercase text-bold mt-4">
                                                    <u> Documents
                                                        Required </u>
                                                </h6>
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td width="40%">
                                                                @php
                                                                    $required_wanting_documents_id = explode(', ', rtrim($data->required_wanting_documents_id, ', '));
                                                                @endphp
                                                                @if($data->required_wanting_documents_id)
                                                                    @if (count($required_wanting_documents_id)> 1)
                                                                        @foreach ($required_wanting_documents_id as $pro)
                                                                            <p>{{ $pro }}</p>
                                                                        @endforeach
                                                                    @else
                                                                        @foreach ($required_wanting_documents_id as $pro)
                                                                            {{ $pro }}
                                                                        @endforeach
                                                                    @endif
                                                                @endif
                                                            </td>
                                                            <td width="40%"> 
                                                                @php
                                                                    $required_wanting_documents = explode(', ', rtrim($data->required_wanting_documents, ', '));
                                                                @endphp
                                                                @if($data->required_wanting_documents)
                                                                    @if (count($required_wanting_documents)> 1)
                                                                        @foreach ($required_wanting_documents as $pro)
                                                                            <p>{{ $pro }}</p>
                                                                        @endforeach
                                                                    @else
                                                                        @foreach ($required_wanting_documents as $pro)
                                                                            {{ $pro }}
                                                                        @endforeach
                                                                    @endif
                                                                @endif
                                                            </td>
                                                            <td width="20%"> 
                                                                @php
                                                                    $required_wanting_documents_date = explode(', ', rtrim($data->required_wanting_documents_date, ', '));
                                                                @endphp
                                                                @if($data->required_wanting_documents_date)
                                                                    @if (count($required_wanting_documents_date)> 1)
                                                                        @foreach ($required_wanting_documents_date as $pro)
                                                                            <p>{{ date('d-m-Y', strtotime($pro)) }}</p>
                                                                        @endforeach
                                                                    @else
                                                                        @foreach ($required_wanting_documents_date as $pro)
                                                                            {{ date('d-m-Y', strtotime($pro)) }}
                                                                        @endforeach
                                                                    @endif
                                                                @endif
                                                            </td>
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
                                                <h6 class="text-uppercase text-bold"><u> Case Information </u>
                                                    
                                                </h6>
                                                <table class="table table-bordered">

                                                    <tbody>

                                                    <tr>
                                                        <td width="50%">Division</td>
                                                        <td width="50%"> {{ $data->case_infos_division_name }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>District</td>
                                                        <td>{{ $data->case_infos_district_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Thana</td>
                                                        <td>{{ $data->case_infos_thana_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Case Category</td>
                                                        <td>{{ $data->case_category }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Case Subcategory</td>
                                                        <td>{{ $data->case_subcategory }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Case Matter</td>
                                                        <td>{{ $data->matter_name }} {{ $data->matter_write }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Case Type</td>
                                                        <td>{{ $data->case_types_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Case Title</td>
                                                        <td>{{ $data->case_infos_case_title_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Case No.</td>
                                                        <td>{{ rtrim($data->case_infos_case_no, ', ') }} {{ rtrim($data->case_infos_case_year, ', ') }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Name of the Court</td>
                                                        <td>
                                                            @php
                                                                $case_infos_court_id = explode(', ',$data->case_infos_court_id);
                                                            @endphp
                                                            @if($data->case_infos_court_id)
                                                                @if (count($case_infos_court_id)> 1)
                                                                    @foreach ($case_infos_court_id as $pro)
                                                                        <li class="text-left">{{ $pro }}</li>
                                                                    @endforeach
                                                                @else
                                                                    @foreach ($case_infos_court_id as $pro)
                                                                        {{ $pro }}
                                                                    @endforeach
                                                                @endif
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Name of Court(Short)</td>
                                                        <td>
                                                            @php
                                                                $case_infos_court_short_id = explode(', ',$data->case_infos_court_short_id);
                                                            @endphp
                                                            @if($data->case_infos_court_short_id)
                                                                @if (count($case_infos_court_short_id)> 1)
                                                                    @foreach ($case_infos_court_short_id as $pro)
                                                                        <li class="text-left">{{ $pro }}</li>
                                                                    @endforeach
                                                                @else
                                                                    @foreach ($case_infos_court_short_id as $pro)
                                                                        {{ $pro }}
                                                                    @endforeach
                                                                @endif
                                                            @endif

                                                            @php
                                                                $court_short_write = explode(', ',$data->court_short_write);
                                                            @endphp
                                                            @if($data->court_short_write)
                                                                @if (count($court_short_write)> 1)
                                                                    @foreach ($court_short_write as $pro)
                                                                        <li class="text-left">{{ $pro }}</li>
                                                                    @endforeach
                                                                @else
                                                                    @foreach ($court_short_write as $pro)
                                                                        {{ $pro }}
                                                                    @endforeach
                                                                @endif
                                                            @endif

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Sub Seq. Case Title</td>
                                                        <td> {{ $data->sub_seq_case_infos_case_title_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Sub Seq. Case No.</td>
                                                        <td>
                                                            @php
                                                                $case_infos_sub_seq_case_no = explode(', ',$data->case_infos_sub_seq_case_no);
                                                            @endphp
                                                            @if($data->case_infos_sub_seq_case_no)
                                                                @if (count($case_infos_sub_seq_case_no)> 1)
                                                                    @foreach ($case_infos_sub_seq_case_no as $pro)
                                                                        <li class="text-left">{{ $pro }}</li>
                                                                    @endforeach
                                                                @else
                                                                    @foreach ($case_infos_sub_seq_case_no as $pro)
                                                                        {{ $pro }}
                                                                    @endforeach
                                                                @endif
                                                            @endif

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Sub-Seq. Court</td>
                                                        <td>
                                                            @php
                                                                $case_infos_sub_seq_court_id = explode(', ',$data->case_infos_sub_seq_court_id);
                                                            @endphp
                                                            @if($data->case_infos_sub_seq_court_id)
                                                                @if (count($case_infos_sub_seq_court_id)> 1)
                                                                    @foreach ($case_infos_sub_seq_court_id as $pro)
                                                                        <li class="text-left">{{ $pro }}</li>
                                                                    @endforeach
                                                                @else
                                                                    @foreach ($case_infos_sub_seq_court_id as $pro)
                                                                        {{ $pro }}
                                                                    @endforeach
                                                                @endif
                                                            @endif


                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Sub-Seq. Court(Short)</td>
                                                        <td>
                                                            @php
                                                                $case_infos_sub_seq_court_short_id = explode(', ',$data->case_infos_sub_seq_court_short_id);
                                                            @endphp
                                                            @if($data->case_infos_sub_seq_court_short_id)
                                                                @if (count($case_infos_sub_seq_court_short_id)> 1)
                                                                    @foreach ($case_infos_sub_seq_court_short_id as $pro)
                                                                        <li class="text-left">{{ $pro }}</li>
                                                                    @endforeach
                                                                @else
                                                                    @foreach ($case_infos_sub_seq_court_short_id as $pro)
                                                                        {{ $pro }}
                                                                    @endforeach
                                                                @endif
                                                            @endif
                                                            @php
                                                                $sub_seq_court_short_write = explode(', ',$data->sub_seq_court_short_write);
                                                            @endphp
                                                            @if($data->sub_seq_court_short_write)
                                                                @if (count($sub_seq_court_short_write)> 1)
                                                                    @foreach ($sub_seq_court_short_write as $pro)
                                                                        <li class="text-left">{{ $pro }}</li>
                                                                    @endforeach
                                                                @else
                                                                    @foreach ($sub_seq_court_short_write as $pro)
                                                                        {{ $pro }}
                                                                    @endforeach
                                                                @endif
                                                            @endif

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Law</td>
                                                        <td>
                                                            @php
                                                                $law_id = explode('/ ',$data->law_id);
                                                                $law_write = explode('/ ',$data->law_write);
                                                                // dd(!empty($data->law_id));
                                                            @endphp

                                                            @if($data->law_id || $data->law_write)
                                                                @if (count($law_id)>= 1 && count($law_write)>= 1)
                                                                    @if (!empty($data->law_id) && count($law_id)>= 1 && count($law_write)>= 1)
                                                                    {{-- {{ dd('case info') }} --}}
                                                                        @foreach ($law_id as $pro)
                                                                            <li class="text-left">{{ $pro }}</li>
                                                                        @endforeach
                                                                    @else
                                                                        @foreach ($law_id as $pro)
                                                                            {{ $pro }}
                                                                        @endforeach
                                                                    @endif
                                                                    @if (!empty($data->law_write) && count($law_write)>= 1 && count($law_id)>= 1)
                                                                        @foreach ($law_write as $pro)
                                                                            <li class="text-left">{{ $pro }}</li>
                                                                        @endforeach
                                                                    @else
                                                                        @foreach ($law_write as $pro)
                                                                            {{ $pro }}
                                                                        @endforeach
                                                                    @endif
                                                                @elseif (count($law_id)> 1 && count($law_write) == 0)
                                                                    @foreach ($law_id as $pro)
                                                                        <li class="text-left">{{ $pro }}</li>
                                                                    @endforeach
                                                                    @foreach ($law_write as $pro)
                                                                        {{ $pro }}
                                                                    @endforeach
                                                                @elseif (count($law_id) == 0 && count($law_write)> 1)
                                                                    @foreach ($law_id as $pro)
                                                                        {{ $pro }}
                                                                    @endforeach
                                                                    @foreach ($law_write as $pro)
                                                                        <li class="text-left">{{ $pro }}</li>
                                                                    @endforeach
                                                                @else
                                                                    @foreach ($law_id as $pro)
                                                                        {{ $pro }}
                                                                    @endforeach
                                                                    @foreach ($law_write as $pro)
                                                                        {{ $pro }}
                                                                    @endforeach
                                                                @endif
                                                            @endif



                                                            {{-- @if($data->law_id)
                                                                @if (count($law_id)> 1)
                                                                    @foreach ($law_id as $pro)
                                                                        <li class="text-left">{{ $pro }}</li>
                                                                    @endforeach
                                                                @else
                                                                    @foreach ($law_id as $pro)
                                                                        {{ $pro }}
                                                                    @endforeach
                                                                @endif
                                                            @endif
                              
                                                            @if($data->law_write)
                                                                @if (count($law_write)> 1)
                                                                    @foreach ($law_write as $pro)
                                                                        <li class="text-left">{{ $pro }}</li>
                                                                    @endforeach
                                                                @else
                                                                    @foreach ($law_write as $pro)
                                                                        {{ $pro }}
                                                                    @endforeach
                                                                @endif
                                                            @endif --}}


                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Section</td>
                                                        <td>
                                                            @php
                                                                $section_id = explode(', ',$data->section_id);
                                                            @endphp
                                                            @if($data->section_id)
                                                                @if (count($section_id)> 1)
                                                                    @foreach ($section_id as $pro)
                                                                        <li class="text-left">{{ $pro }}</li>
                                                                    @endforeach
                                                                @else
                                                                    @foreach ($section_id as $pro)
                                                                        {{ $pro }}
                                                                    @endforeach
                                                                @endif
                                                            @endif
                                                            @php
                                                                $section_write = explode(', ',$data->section_write);
                                                            @endphp
                                                            @if($data->section_write)
                                                                @if (count($section_write)> 1)
                                                                    @foreach ($section_write as $pro)
                                                                        <li class="text-left">{{ $pro }}</li>
                                                                    @endforeach
                                                                @else
                                                                    @foreach ($section_write as $pro)
                                                                        {{ $pro }}
                                                                    @endforeach
                                                                @endif
                                                            @endif


                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Case Filing Date</td>
                                                        <td>{{ $data->date_of_filing }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status of the Cases</td>
                                                        <td>{{ $data->case_status_name }}</td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td>Complainant/Informant Name</td>
                                                        <td>
                                                            @php
                                                                $case_infos_complainant_informant_name = explode(', ',$data->case_infos_complainant_informant_name);
                                                            @endphp
                                                            @if($data->case_infos_complainant_informant_name)
                                                                @if (count($case_infos_complainant_informant_name)> 1)
                                                                    @foreach ($case_infos_complainant_informant_name as $pro)
                                                                        <li class="text-left">{{ $pro }}</li>
                                                                    @endforeach
                                                                @else
                                                                    @foreach ($case_infos_complainant_informant_name as $pro)
                                                                        {{ $pro }}
                                                                    @endforeach
                                                                @endif
                                                            @endif

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Complainant/Informant's Representative</td>
                                                        <td>
                                                            @php
                                                                $complainant_informant_representative = explode(', ',$data->complainant_informant_representative);
                                                            @endphp
                                                            @if($data->complainant_informant_representative)
                                                                @if (count($complainant_informant_representative)> 1)
                                                                    @foreach ($complainant_informant_representative as $pro)
                                                                        <li class="text-left">{{ $pro }}</li>
                                                                    @endforeach
                                                                @else
                                                                    @foreach ($complainant_informant_representative as $pro)
                                                                        {{ $pro }}
                                                                    @endforeach
                                                                @endif
                                                            @endif

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Accused Name</td>
                                                        <td>
                                                            @php
                                                                $case_infos_accused_name = explode(', ',$data->case_infos_accused_name);
                                                            @endphp
                                                            @if($data->case_infos_accused_name)
                                                                @if (count($case_infos_accused_name)> 1)
                                                                    @foreach ($case_infos_accused_name as $pro)
                                                                        <li class="text-left">{{ $pro }}</li>
                                                                    @endforeach
                                                                @else
                                                                    @foreach ($case_infos_accused_name as $pro)
                                                                        {{ $pro }}
                                                                    @endforeach
                                                                @endif
                                                            @endif

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Accused's Representative</td>
                                                        <td>
                                                            @php
                                                                $case_infos_accused_representative = explode(', ',$data->case_infos_accused_representative);
                                                            @endphp
                                                            @if($data->case_infos_accused_representative)
                                                                @if (count($case_infos_accused_representative)> 1)
                                                                    @foreach ($case_infos_accused_representative as $pro)
                                                                        <li class="text-left">{{ $pro }}</li>
                                                                    @endforeach
                                                                @else
                                                                    @foreach ($case_infos_accused_representative as $pro)
                                                                        {{ $pro }}
                                                                    @endforeach
                                                                @endif
                                                            @endif

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Prosecution Witnesses</td>
                                                        <td>{{ $data->prosecution_witness }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Defense Witnesses</td>
                                                        <td> {{ $data->defense_witness }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Allegation/Claim</td>
                                                        <td> {{ $data->allegation_name }} {{ $edit_case_steps->case_infos_allegation_claim_write }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Amount of Money</td>
                                                        <td>{{ number_format($edit_case_steps->amount_of_money, 2) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Another Claim(if any)</td>
                                                        <td>{{ $edit_case_steps->another_claim }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Recovery/Seizure Articles</td>
                                                        <td>{{ $edit_case_steps->recovery_seizure_articles }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Summary of Facts</td>
                                                        <td>{{ $edit_case_steps->summary_facts }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Remarks</td>
                                                        <td>{{ $edit_case_steps->case_info_remarks }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="text-uppercase text-bold"><u> Lawyers Information </u>
                                                    
                                                </h6>
                                                <table class="table table-bordered">

                                                    <tbody>

                                                    <tr>
                                                        <td width="50%">Name of Advocate/Law Firm</td>
                                                        <td width="50%"> {{ $data->first_name }} {{ $data->middle_name }} {{ $data->last_name }} {{ $data->lawyer_advocate_write }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Name of Assigned Lawyer</td>
                                                        <td>
                                                            @php
                                                                $assigned_lawyer_id = explode(', ',$data->assigned_lawyer_id);
                                                            @endphp
                                                            @if($data->assigned_lawyer_id)
                                                                @if (count($assigned_lawyer_id)> 1)
                                                                    @foreach ($assigned_lawyer_id as $pro)
                                                                        <li class="text-left">{{ $pro }}</li>
                                                                    @endforeach
                                                                @else
                                                                    @foreach ($assigned_lawyer_id as $pro)
                                                                        {{ $pro }}
                                                                    @endforeach
                                                                @endif
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Remarks</td>
                                                        <td> {{ $data->lawyers_remarks }} </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="text-uppercase text-bold"><u> Status of the Case </u>
                                                </h6>
                                                <table class="table table-bordered">

                                                    <tbody>

                                                    <tr>
                                                        <td width="50%">Status</td>
                                                        <td width="50%"> @if(!empty($latest)) {{ $latest->case_status_name }} @endif</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Next Date</td>
                                                        <td> {{ date('d-m-Y', strtotime($data->next_date)) }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Next Date Fixed For</td>
                                                        <td> @if(!empty($latest))  {{ $latest->next_date_reason_name }} @endif </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Remarks</td>
                                                        <td> @if(!empty($latest))  {{ $latest->updated_remarks }} @endif </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="text-uppercase text-bold">
                                                    <div class="row">
                                                        <div class="col-md-4"><u> Case Steps </u>
                                                        </div>
                                                        <div class="col-md-3">Date</div>
                                                        <div class="col-md-2">Copy</div>
                                                        <div class="col-md-3">Yes/No
                                                            
                                                        </div>
                                                    </div>
                                                </h6>
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td width="30%">Filing Date</td>
                                                            <td width="20%"> {{ $edit_case_steps->case_steps_filing }} </td>
                                                            <td width="30%"> {{ $edit_case_steps->case_steps_filing_copy }} </td>
                                                            <td width="20%"> {{ $edit_case_steps->case_steps_filing_yes_no }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Taking Cognizance</td>
                                                            <td> {{ $edit_case_steps->taking_cognizance }} </td>
                                                            <td> {{ $edit_case_steps->taking_cognizance_copy }} </td>
                                                            <td> {{ $edit_case_steps->taking_cognizance_yes_no }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Arrest/Surrender/C.W.</td>
                                                            <td> {{ $edit_case_steps->arrest_surrender_cw }} </td>
                                                            <td> {{ $edit_case_steps->arrest_surrender_cw_copy }} </td>
                                                            <td> {{ $edit_case_steps->arrest_surrender_cw_yes_no }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Bail</td>
                                                            <td> {{ $edit_case_steps->case_steps_bail }} </td>
                                                            <td> {{ $edit_case_steps->case_steps_bail_copy }} </td>
                                                            <td> {{ $edit_case_steps->case_steps_bail_yes_no }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Court Transfer</td>
                                                            <td> {{ $edit_case_steps->case_steps_court_transfer }} </td>
                                                            <td> {{ $edit_case_steps->case_steps_court_transfer_copy }} </td>
                                                            <td> {{ $edit_case_steps->case_steps_court_transfer_yes_no }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Charge Framed</td>
                                                            <td> {{ $edit_case_steps->case_steps_charge_framed }} </td>
                                                            <td> {{ $edit_case_steps->case_steps_charge_framed_copy }} </td>
                                                            <td> {{ $edit_case_steps->case_steps_charge_framed_yes_no }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Witness (From)</td>
                                                            <td> {{ $edit_case_steps->case_steps_witness_from }} </td>
                                                            <td> {{ $edit_case_steps->case_steps_witness_from_copy }} </td>
                                                            <td> {{ $edit_case_steps->case_steps_witness_from_yes_no }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Witness (To)</td>
                                                            <td> {{ $edit_case_steps->case_steps_witness_to }} </td>
                                                            <td> {{ $edit_case_steps->case_steps_witness_to_copy }} </td>
                                                            <td> {{ $edit_case_steps->case_steps_witness_to_yes_no }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Argument</td>
                                                            <td> {{ $edit_case_steps->case_steps_argument }} </td>
                                                            <td> {{ $edit_case_steps->case_steps_argument_copy }} </td>
                                                            <td> {{ $edit_case_steps->case_steps_argument_yes_no }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Judgement & Order</td>
                                                            <td> {{ $edit_case_steps->case_steps_judgement_order }} </td>
                                                            <td> {{ $edit_case_steps->case_steps_judgement_order_copy }} </td>
                                                            <td> {{ $edit_case_steps->case_steps_judgement_order_yes_no }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Summary of Judgement & Order</td>
                                                            <td> {{ $edit_case_steps->case_steps_summary_judgement_order }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Remarks</td>
                                                            <td> {{ $edit_case_steps->case_steps_remarks }} </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

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




