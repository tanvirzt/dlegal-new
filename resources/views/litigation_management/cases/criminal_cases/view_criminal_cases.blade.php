@extends('layouts.admin_layouts.admin_layout')
@section('content')

    <style>
        th {
            text-align: right;
            width: 25%;
        }

        td {
            width: 25%;
        }
    </style>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"> Criminal Cases </h1>

                    </div><!-- /.col -->


                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md"
                                   type="button" href="{{ route('criminal-cases') }}" aria-disabled="false" role="link" tabindex="-1">
                                    Back </a>
                            </li>
                        </ol>
                    </div>


                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->


        <section class="content">
            <div class="container-fluid py-2">
                <div class="col-md-12">
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            {{Session::get('success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card">
                        <div>
                            <div class="card-header">
                                <h3 class="card-title custom_h3 font-italic text-uppercase font_weight" id="heading">View Criminal Case
                                    No. {{ $data->case_no }}</h3>
                                <div class="float-right">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-lg"
                                            data-toggle="tooltip"
                                            data-placement="top" title="Update Status"><i
                                            class="far fa-bell"></i></button>

                                    <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-lg-2"
                                            data-toggle="tooltip"
                                            data-placement="top" title="Update Activities"><i class="fas fa-chart-line"></i></button>


                                    <a href="{{ route('edit-criminal-cases', $data->id) }}">
                                        <button
                                            class="btn btn-info btn-sm" data-toggle="tooltip"
                                            data-placement="top" title="Edit"><i
                                                class="fas fa-edit"></i></button>
                                    </a>
                                </div>

                            </div>

                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="appeal_case_info">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6 class="text-uppercase text-bold"><u> Basic Information </u>
                                                    </h6>

                                                    <table class="table table-bordered table-responsive">

                                                        <tbody>
                                                        <tr>
                                                            <td>ID</td>
                                                            <td> {{ $data->id }} </td>
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
                                                            <td>{{ $data->next_date }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Next date fixed for</td>
                                                            <td> {{ $data->next_date_reason_name }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Received Date</td>
                                                            <td>{{ $data->received_date }}</td>
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

                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6 class="text-uppercase text-bold"><u> Client Information </u>
                                                    </h6>
                                                    <table class="table table-bordered table-responsive">

                                                        <tbody>
                                                        <tr>
                                                            <td>Client(Which Party)</td>
                                                            <td> {{ $data->client_party_name }} </td>
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
                                                            <td>{{ $data->client_name }} {{ rtrim($data->client_name_write, ', ') }}</td>
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
                                                    <table class="table table-bordered table-responsive">

                                                        <tbody>
                                                        <tr>
                                                            <td>Opposition(Which Party)</td>
                                                            <td> {{ $data->oppsition_party_name }} </td>
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
                                                            <td>{{ $data->opposition_name }} {{ rtrim($data->opposition_write, ', ') }}</td>
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


                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="revision_case_info">

                                            <div class="card">
                                                <div class="card-body">
                                                    <h6 class="text-uppercase text-bold"><u> Case Information </u>
                                                    </h6>
                                                    <table class="table table-bordered table-responsive">

                                                        <tbody>

                                                        <tr>
                                                            <td>Division</td>
                                                            <td> {{ $data->case_infos_division_name }} </td>
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
                                                            <td>Case Title</td>
                                                            <td>{{ $data->case_infos_case_title_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Case No.</td>
                                                            <td>{{ rtrim($data->case_infos_case_no, ', ') }} {{ rtrim($data->case_infos_case_year, ', ') }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Name of the Court</td>
                                                            <td>{{ $data->case_infos_court_id }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Name of Court(Short)</td>
                                                            <td>{{ $data->case_infos_court_short_id }} {{ $data->court_short_write }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sub Seq. Case Title</td>
                                                            <td> {{ $data->sub_seq_case_infos_case_title_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sub Seq. Case No.</td>
                                                            <td> {{ rtrim($data->case_infos_sub_seq_case_no, ', ') }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sub-Seq. Court</td>
                                                            <td> {{ $data->case_infos_sub_seq_court_id }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sub-Seq. Court(Short)</td>
                                                            <td> {{ $data->case_infos_sub_seq_court_short_id }} {{ $data->sub_seq_court_short_write }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Law</td>
                                                            <td>{{ $data->law_id }} {{ rtrim($data->law_write, ', ') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Section</td>
                                                            <td> {{ $data->section_id }} {{ rtrim($data->section_write, ', ') }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Case Filing Date</td>
                                                            <td>{{ $data->date_of_filing }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Case Matter</td>
                                                            <td>{{ $data->matter_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Case Type</td>
                                                            <td>{{ $data->case_types_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Complainant/Informant Name</td>
                                                            <td> {{ rtrim($data->case_infos_complainant_informant_name, ', ') }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Complainant/Informant's Representative</td>
                                                            <td> {{ rtrim($data->complainant_informant_representative, ', ') }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Accused Name</td>
                                                            <td> {{ rtrim($data->case_infos_accused_name, ', ') }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Accused's Representative</td>
                                                            <td>{{ rtrim($data->case_infos_accused_representative, ', ') }}</td>
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
                                                            <td> {{ $data->allegation_name }} {{ $data->case_infos_allegation_claim_write }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Amount of Money</td>
                                                            <td>{{ $data->amount_of_money }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Another Claim(if any)</td>
                                                            <td>{{ $data->another_claim }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Recovery/Seizure Articles</td>
                                                            <td>{{ $data->recovery_seizure_articles }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Summary of Facts</td>
                                                            <td>{{ $data->summary_facts }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Remarks</td>
                                                            <td>{{ $data->case_info_remarks }}</td>
                                                        </tr>


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6 class="text-uppercase text-bold"><u> Lawyers Information </u>
                                                    </h6>
                                                    <table class="table table-bordered table-responsive">

                                                        <tbody>

                                                        <tr>
                                                            <td>Name of Advocate/Law Firm</td>
                                                            <td> {{ $data->first_name }} {{ $data->middle_name }} {{ $data->last_name }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Name of Assigned Lawyer</td>
                                                            <td> {{ $data->assigned_lawyer_id }} </td>
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
                                                    <h6 class="text-uppercase text-bold"><u> Documents
                                                            Information </u></h6>
                                                    <table class="table table-bordered table-responsive">

                                                        <tbody>

                                                        <tr>
                                                            <td>Received Documents</td>
                                                            <td> {{ $data->received_documents_id }} {{ rtrim($data->received_documents_write, ', ') }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Required/Wanting Documents</td>
                                                            <td> {{ $data->required_wanting_documents_id }} {{ rtrim($data->required_wanting_documents_write, ', ') }} </td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-body">
                                                    <h6 class="text-uppercase text-bold"><u> Status of the Case </u>
                                                    </h6>
                                                    <table class="table table-bordered table-responsive">

                                                        <tbody>

                                                        <tr>
                                                            <td>Status</td>
                                                            <td> @if(!empty($latest)) {{ $latest->case_status_name }} @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Next Date</td>
                                                            <td> {{ $data->next_date }} </td>
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
                                                    <h6 class="text-uppercase text-bold"><u> Case Steps </u>
                                                    </h6>
                                                    <table class="table table-bordered table-responsive">

                                                        <tbody>

                                                        <tr>
                                                            <td>Next Date</td>
                                                            <td> {{ $edit_case_steps->case_steps_filing }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Taking Cognizance</td>
                                                            <td> {{ $edit_case_steps->taking_cognizance }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Arrest/Surrender/C.W.</td>
                                                            <td>  {{ $edit_case_steps->arrest_surrender_cw }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Bail</td>
                                                            <td> {{ $edit_case_steps->case_steps_bail }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Court Transfer</td>
                                                            <td> {{ $edit_case_steps->case_steps_court_transfer }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Charge Framed</td>
                                                            <td> {{ $edit_case_steps->case_steps_charge_framed }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Witness (From)</td>
                                                            <td> {{ $edit_case_steps->case_steps_witness_from }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Witness (To)</td>
                                                            <td> {{ $edit_case_steps->case_steps_witness_to }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Argument</td>
                                                            <td> {{ $edit_case_steps->case_steps_argument }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Judgement & Order</td>
                                                            <td> {{ $edit_case_steps->case_steps_judgement_order }} </td>
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



                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title custom_h3 text-uppercase font-italic font_weight" id="heading">Case Proceedings Log <span
                                            class="font-italic custom_font">(Case No: {{ $data->case_no }}, Court Name: {{ $data->court_name }})</span>
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <table class="table table-bordered table-striped data_table">
                                        <thead>
                                        <tr>
                                            <th class="text-nowrap">Date</th>
                                            <th class="text-nowrap">Fixed For</th>
                                            <th class="text-nowrap">Court Proceeding</th>
                                            <th class="text-nowrap">Court Order</th>
                                            <th class="text-nowrap">Next Date</th>
                                            <th class="text-nowrap">Next Day Presence</th>
                                            <th class="text-nowrap">Day Note</th>
                                            <th class="text-nowrap">Engaged Advocates</th>
                                            <th class="text-nowrap">Update</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($case_logs as $logs)
                                            <tr>
                                                <td> {{ $logs->updated_order_date }} </td>
                                                <td> {{ $logs->next_date_reason_name }} {{ $logs->updated_fixed_for_write }} </td>
                                                <td >

                                                    @php
                                                        $proceedings = explode(', ',$logs->court_proceedings_id);
                                                    @endphp
                                                    @if($logs->court_proceedings_id)
                                                        @foreach ($proceedings as $pro)
                                                            <li class="text-left">{{ $pro }}</li>
                                                        @endforeach
                                                    @endif
                                                    {{ $logs->court_proceedings_write }} </td>
                                                <td style="padding-right: 80px;">
                                                    @php
                                                        $order = explode(', ',$logs->updated_court_order_id);
                                                    @endphp
                                                    @if($logs->updated_court_order_id)
                                                        @foreach ($order as $pro)
                                                            <li class="text-left">{{ $pro }}</li>
                                                        @endforeach
                                                    @endif
                                                    {{ $logs->updated_court_order_write }}</td>
                                                <td> {{ $logs->updated_next_date }} </td>
                                                <td> {{ $logs->next_day_presence_name }} </td>

                                                <td>
                                                    @php
                                                        $notes = explode(', ',$logs->updated_day_notes_id);
                                                    @endphp
                                                    @if($logs->updated_day_notes_id)
                                                        @foreach ($notes as $pro)
                                                            <li class="text-left">{{ $pro }}</li>
                                                        @endforeach
                                                    @endif
                                                    {{ $logs->updated_day_notes_write }} </td>
                                                <td > {{ $logs->first_name }} {{ $logs->middle_name }} {{ $logs->last_name }} {{ $logs->updated_engaged_advocate_write }} </td>
                                                <td> {{ $logs->created_at }} </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title custom_h3 text-uppercase font-italic font_weight" id="heading">Case Activities Log</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <table class="table table-bordered table-striped data_table">
                                        <thead>
                                        <tr>
                                            <th class="text-nowrap">Date</th>
                                            <th class="text-nowrap">Activity/Action</th>
                                            <th class="text-nowrap">Progress</th>
                                            <th class="text-nowrap">Mode</th>
                                            <th class="text-nowrap">Time Spent</th>
                                            <th class="text-nowrap">Engaged</th>
                                            <th class="text-nowrap">Forwarded To</th>
                                            <th class="text-nowrap">Update</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($case_activity_log as $activity_log)
                                            <tr>
                                                <td> {{ $activity_log->activity_date }} </td>
                                                <td> {{ $activity_log->activity_action }} </td>
                                                <td> {{ $activity_log->activity_progress }} </td>
                                                <td> {{ $activity_log->mode_name }} {{ $activity_log->activity_mode_write }} </td>
                                                <td> {{ $activity_log->activity_time_spent }} </td>
                                                <td>
                                                    @php
                                                    $engaged = explode(', ',$activity_log->activity_engaged_id);
                                                    @endphp

                                                    @if($activity_log->activity_engaged_id)
                                                        @foreach($engaged as $item)
                                                            <li class="text-left">{{ $item }}</li>
                                                        @endforeach
                                                    @endif

                                                    {{ $activity_log->activity_engaged_write }} </td>
                                                <td> {{ $activity_log->forwarded_first_name }} {{ $activity_log->forwarded_middle_name }} {{ $activity_log->forwarded_last_name }} {{ $activity_log->activity_forwarded_to_write }} </td>
                                                <td> {{ $activity_log->created_at }} </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title custom_h3 text-uppercase font-italic font_weight" id="heading">Documents Log
                                        @php
                                            $now = Carbon\Carbon::now();
                                            $days_count = Carbon\Carbon::parse($data->created_at)->diffInDays($now);
                                        @endphp

                                        <span class="font-italic custom_font"> (Total Elapsed Time:

                                           {{ $days_count }} Days) </span>
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <table class="table table-bordered table-striped data_table">
                                        <thead>
                                        <tr>
                                            <th>Uploaded Document</th>
                                            <th>Uploaded By</th>
                                            <th>Date & Time</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($criminal_cases_files as $files)
                                            <tr>
                                                <td>{{ $files->uploaded_document }} </td>
                                                <td>{{ $files->created_by }} </td>
                                                <td>{{ $files->created_at }} </td>
                                                <td>
                                                    <form method="get" action="{{ route('delete-criminal-cases-files',$files->id) }}"
                                                          class="delete-user btn btn-outline-danger btn-xs">
                                                        @csrf
                                                        <button type="submit" class="btn  btn-sm" data-toggle="tooltip" data-placement="top"
                                                                title="Delete"><i class="fas fa-trash"></i></button>
                                                    </form>

                                                    <a href="{{ route('download-criminal-cases-files', $files->id) }}">
                                                        <button
                                                            class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                                                            data-placement="top" title="Download"><i class="fas fa-download"></i></button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title custom_h3 text-uppercase font-italic font_weight" id="heading">Billings Log</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <table class="table table-bordered table-striped data_table">
                                        <thead>
                                        <tr>
                                            <th>Bill Type</th>
                                            <th>Payment Type</th>
                                            <th>District Name</th>
                                            <th>Panel Lawyer</th>
                                            <th>Bill Amount</th>
                                            <th>Billing Date</th>
                                            <th>Bank Name</th>
                                            <th>Bank Branch</th>
                                            <th>Cheque No.</th>
                                            <th>Payment Amount</th>
                                            <th>Digital Payment</th>
                                            <th>Approval</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($bill_history as $bill_logs)
                                            <tr>
                                                <td> {{ $bill_logs->bill_type_name }} </td>
                                                <td> {{ $bill_logs->payment_type }} </td>
                                                <td> {{ $bill_logs->district_name }} </td>
                                                <td> {{ $bill_logs->first_name }} </td>
                                                <td> {{ $bill_logs->bill_amount }} </td>
                                                <td> {{ $bill_logs->date_of_billing }} </td>
                                                <td> {{ $bill_logs->bank_name }} </td>
                                                <td> {{ $bill_logs->bank_branch_name }} </td>
                                                <td> {{ $bill_logs->cheque_no }} </td>
                                                <td> {{ $bill_logs->payment_amount }} </td>
                                                <td> {{ $bill_logs->digital_payment_type_name }} </td>
                                                <td> {{ $bill_logs->is_approved }} </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->

    <!-- /.modal -->

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="card-title"> Update Criminal Case Status </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form
                    action="{{ route('update-criminal-cases-status', $data->id) }}"
                    method="post">
                    <div class="">

                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="updated_case_status_id"
                                               class="col-md-4 col-form-label"> Status
                                        </label>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select name="updated_case_status_id"
                                                            id="updated_case_status_id"
                                                            class="form-control select2">
                                                        <option value="">Select</option>
                                                        @foreach($case_status as $item)
                                                            <option
                                                                value="{{ $item->id }}" {{  old('updated_case_status_id') == $item->id ? 'selected' : '' }}>{{ $item->case_status_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"
                                                           id="updated_case_status_write"
                                                           name="updated_case_status_write"
                                                           placeholder="Status"
                                                           value="{{ old('updated_case_status_write') }}">
                                                </div>
                                            </div>

                                            @error('updated_case_status')<span
                                                class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="updated_order_date"
                                               class="col-sm-4 col-form-label">
                                            Order Date
                                        </label>
                                        <div class="col-sm-8">
                                                                                <span class="date_span_status_modal">
                                                                                    <input type="date" class="xDateContainer date_first_input"
                                                                                           onchange="setCorrect(this,'updated_order_date');"><input
                                                                                        type="text" id="updated_order_date" name="updated_order_date"
                                                                                        value="dd/mm/yyyy"
                                                                                        class="date_second_input"
                                                                                        tabindex="-1"><span
                                                                                        class="date_second_span" tabindex="-1">&#9660;</span>
                                                                                </span>
                                            @error('updated_order_date')
                                            <span
                                                class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="updated_fixed_for_id"
                                               class="col-md-4 col-form-label"> Fixed For
                                        </label>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select name="updated_fixed_for_id"
                                                            id="updated_fixed_for_id"
                                                            class="form-control select2">
                                                        <option value="">Select</option>
                                                        @foreach($next_date_reason as $item)
                                                            <option
                                                                value="{{ $item->id }}" {{(old('updated_fixed_for_id') == $item->id ? 'selected':'')}}>{{ $item->next_date_reason_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"
                                                           id="updated_fixed_for_write"
                                                           name="updated_fixed_for_write"
                                                           placeholder="Fixed For"
                                                           value="{{ old('updated_fixed_for_write') }}">
                                                </div>
                                            </div>

                                            @error('updated_fixed_for')<span
                                                class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="court_proceedings_id"
                                               class="col-md-4 col-form-label"> Court Proceeding
                                        </label>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select name="court_proceedings_id[]"
                                                            id="court_proceedings_id"
                                                            class="form-control select2" multiple>
                                                        <option value="">Select</option>
                                                        @foreach($court_proceeding as $item)
                                                            <option
                                                                value="{{ $item->court_proceeding_name }}" {{  old('court_proceedings_id') == $item->id ? 'selected' : '' }}>{{ $item->court_proceeding_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"
                                                           id="court_proceedings_write"
                                                           name="court_proceedings_write"
                                                           placeholder="Court Proceeding"
                                                           value="{{ old('court_proceedings_write') }}">
                                                </div>
                                            </div>

                                            @error('court_proceedings')<span
                                                class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="updated_court_order_id"
                                               class="col-md-4 col-form-label"> Court Order
                                        </label>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select name="updated_court_order_id[]"
                                                            id="updated_court_order_id"
                                                            class="form-control select2" multiple>
                                                        <option value="">Select</option>
                                                        @foreach($last_court_order as $item)
                                                            <option
                                                                value="{{ $item->court_last_order_name }}" {{  old('updated_court_order_id') == $item->court_last_order_name ? 'selected' : '' }}>{{ $item->court_last_order_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"
                                                           id="updated_court_order_write"
                                                           placeholder="Court Order"
                                                           name="updated_court_order_write">

                                                </div>
                                            </div>

                                            @error('updated_court_order_write')<span
                                                class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="updated_next_date"
                                               class="col-sm-4 col-form-label">
                                            Next Date
                                        </label>
                                        <div class="col-sm-8">
                                                                                <span class="date_span_status_modal">
                                                                                    <input type="date" class="xDateContainer date_first_input"
                                                                                           onchange="setCorrect(this,'updated_next_date');"><input type="text" id="updated_next_date" name="updated_next_date"
                                                                                                                                                   value="dd/mm/yyyy"
                                                                                                                                                   class="date_second_input"
                                                                                                                                                   tabindex="-1"><span
                                                                                        class="date_second_span" tabindex="-1">&#9660;</span>
                                                                                </span>
                                            @error('updated_next_date')
                                            <span
                                                class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="updated_day_notes_id"
                                               class="col-md-4 col-form-label"> Day Notes
                                        </label>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select name="updated_day_notes_id[]"
                                                            id="updated_day_notes_id"
                                                            class="form-control select2" multiple>
                                                        <option value="">Select</option>
                                                        @foreach($day_notes as $item)
                                                            <option
                                                                value="{{ $item->day_notes_name }}" {{  old('updated_day_notes_id') == $item->day_notes_name ? 'selected' : '' }}>{{ $item->day_notes_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"
                                                           id="updated_day_notes_write"
                                                           placeholder="Day Notes"
                                                           name="updated_day_notes_write">
                                                </div>
                                            </div>

                                            @error('updated_day_notes_write')<span
                                                class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="updated_engaged_advocate_id"
                                               class="col-md-4 col-form-label"> Engaged Advocate
                                        </label>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select name="updated_engaged_advocate_id"
                                                            class="form-control select2"
                                                    >
                                                        <option value="">Select</option>
                                                        @foreach ($external_council as $item)
                                                            <option
                                                                value="{{ $item->id }}"
                                                                {{ old('updated_engaged_advocate_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->first_name }}
                                                                {{ $item->middle_name }}
                                                                {{ $item->last_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"
                                                           id="updated_engaged_advocate_write"
                                                           placeholder="Engaged Advocate"
                                                           name="updated_engaged_advocate_write">
                                                </div>
                                            </div>

                                            @error('updated_engaged_advocate_write')<span
                                                class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="updated_next_day_presence_id"
                                               class="col-sm-4 col-form-label">
                                            Next Day Presence</label>
                                        <div class="col-sm-8">
                                            <select name="updated_next_day_presence_id"
                                                    class="form-control select2">
                                                <option value="">Select</option>
                                                @foreach($next_day_presence as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{(old('updated_next_day_presence_id') == $item->id ? 'selected':'')}}>{{ $item->next_day_presence_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('updated_next_day_presence_id')<span
                                                class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="updated_remarks"
                                               class="col-sm-4 col-form-label"> Remarks </label>
                                        <div class="col-sm-8">
                                                    <textarea name="updated_remarks" class="form-control"
                                                              rows="3"
                                                              placeholder=""></textarea>
                                            @error('updated_remarks')<span
                                                class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>

                                </div>

                            </div>


                        </div>


                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <div class="float-right">
                            <button type="submit"
                                    class="btn btn-primary text-uppercase"><i
                                    class="fas fa-save"></i> Update
                            </button>
                        </div>
                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- /.modal -->

    <div class="modal fade" id="modal-lg-2">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="card-title"> Update Activities </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form
                    action="{{ route('update-criminal-cases-activity', $data->id) }}"
                    method="post">
                    @csrf
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group row">
                                    <label for="activity_date"
                                           class="col-sm-4 col-form-label"> Date
                                    </label>
                                    <div class="col-sm-8">
                                                                                <span class="date_span_status_modal">
                                                                                    <input type="date" class="xDateContainer date_first_input"
                                                                                           onchange="setCorrect(this,'activity_date');"><input type="text" id="activity_date" name="activity_date"
                                                                                                                                               value="dd/mm/yyyy"
                                                                                                                                               class="date_second_input"
                                                                                                                                               tabindex="-1"><span
                                                                                        class="date_second_span" tabindex="-1">&#9660;</span>
                                                                                </span>

                                        @error('activity_date')
                                        <span
                                            class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="activity_action"
                                           class="col-sm-4 col-form-label"> Activity/Action </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control"
                                               id="activity_action" name="activity_action">
                                        @error('activity_action')
                                        <span
                                            class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="activity_progress"
                                           class="col-sm-4 col-form-label">Progress</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control"
                                               id="activity_progress" name="activity_progress">
                                        @error('activity_progress')
                                        <span
                                            class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="activity_mode_id"
                                           class="col-md-4 col-form-label"> Mode
                                    </label>
                                    <div class="col-md-8">
                                        <div class="row" >
                                            <div class="col-md-6">
                                                <select name="activity_mode_id"
                                                        class="form-control select2"
                                                >
                                                    <option value="">Select</option>
                                                    @foreach ($mode as $item)
                                                        <option
                                                            value="{{ $item->id }}"
                                                            {{ old('activity_mode_id') == $item->mode_name ? 'selected' : '' }}>
                                                            {{ $item->mode_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                       id="activity_mode_write"
                                                       placeholder="Day Notes"
                                                       name="activity_mode_write">
                                            </div>
                                        </div>

                                        @error('activity_mode_write')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">


                                <div class="form-group row">
                                    <label for="activity_time_spent"
                                           class="col-sm-4 col-form-label">Time Spent</label>
                                    <div class="col-sm-8">

                                        @php
                                            $now = Carbon\Carbon::now();
                                            $days_count = Carbon\Carbon::parse($data->created_at)->diffInDays($now);
                                        @endphp

                                        <input type="text" class="form-control" readonly
                                               id="activity_time_spent" name="activity_time_spent" value="{{ $days_count }} day"
                                        >
                                        @error('activity_time_spent')
                                        <span
                                            class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="activity_engaged_id"
                                           class="col-md-4 col-form-label"> Engaged
                                    </label>
                                    <div class="col-md-8">
                                        <div class="row" >
                                            <div class="col-md-6">
                                                <select name="activity_engaged_id[]" class="form-control select2" multiple>
                                                    <option value="">Select</option>
                                                    @foreach ($external_council as $item)
                                                        <option
                                                            value="{{ $item->first_name.' '.$item->middle_name.' '.$item->last_name}}"
                                                            {{ old('updated_engaged_advocate_id') == $item->id ? 'selected' : '' }}>
                                                            {{ $item->first_name }}
                                                            {{ $item->middle_name }}
                                                            {{ $item->last_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                       id="activity_engaged_write"
                                                       placeholder="Activity Engaged"
                                                       name="activity_engaged_write">
                                            </div>
                                        </div>

                                        @error('activity_mode_write')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="activity_forwarded_to_id"
                                           class="col-md-4 col-form-label"> Forwarded To
                                    </label>
                                    <div class="col-md-8">
                                        <div class="row" >
                                            <div class="col-md-6">
                                                <select name="activity_forwarded_to_id"
                                                        class="form-control select2"
                                                >
                                                    <option value="">Select</option>
                                                    @foreach ($external_council as $item)
                                                        <option
                                                            value="{{ $item->id }}"
                                                            {{ old('updated_engaged_advocate_id') == $item->id ? 'selected' : '' }}>
                                                            {{ $item->first_name }}
                                                            {{ $item->middle_name }}
                                                            {{ $item->last_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                       id="activity_forwarded_to_write"
                                                       placeholder="Forwarded To"
                                                       name="activity_forwarded_to_write">
                                            </div>
                                        </div>

                                        @error('activity_forwarded_to_write')<span
                                            class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <div class="float-right">
                                <button type="submit"
                                        class="btn btn-primary text-uppercase"><i
                                        class="fas fa-save"></i> Update
                                </button>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


@endsection





