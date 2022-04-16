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
                        <div >
                            <div class="card-header">
                                <h3 class="card-title custom_h3 text-uppercase" id="heading">Details</h3>
                                <div class="float-right">
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
                                                            <td>Client Name</td>
                                                            <td> {{ $data->client }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Legal Issue</td>
                                                            <td>{{ $data->legal_issue_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Legal Service</td>
                                                            <td>{{ $data->legal_service_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Complainant/Informant Name</td>
                                                            <td>{{ $data->complainant_informant_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Accused Name</td>
                                                            <td>{{ $data->accused_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>In favour of</td>
                                                            <td> {{ $data->in_favour_of_first_name }} {{ $data->in_favour_of_middle_name }} {{ $data->in_favour_of_last_name }} </td>
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
                                                            <td>{{ $data->mode_of_receipt }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Contact Person Name</td>
                                                            <td>{{ $data->contact_person_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Contact Person Details</td>
                                                            <td>{{ $data->contact_person_details }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Received By</td>
                                                            <td>{{ $data->received_by }}</td>
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
                                                            <td>Client Category</td>
                                                            <td> {{ $data->client_category_name }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Client Subcategory</td>
                                                            <td>{{ $data->client_subcategory_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Client Name</td>
                                                            <td>{{ $data->client_name }}</td>
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
                                                            <td>Zone/Division</td>
                                                            <td>{{ $data->client_division_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Area/District</td>
                                                            <td>{{ $data->client_district_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Branch/Thana</td>
                                                            <td>{{ $data->client_thana_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Coordinator/Tadbirkar</td>
                                                            <td>{{ $data->coordinator_name }} {{ $data->coordinator_tadbirkar_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Coordinator Details</td>
                                                            <td>{{ $data->coordinator_details }}</td>
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
                                                            <td> {{ $data->received_documents }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Required/Wanting Documents</td>
                                                            <td> {{ $data->required_wanting_documents }} </td>
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
                                                            <td> {{ rtrim($data->assigned_lawyer, ', ') }} </td>
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
                                                    <table class="table table-bordered table-responsive">
                                                        <tr>
                                                            <td>Status</td>
                                                            <td> {{ $data->case_status_name }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Next Date</td>
                                                            <td> {{ $data->status_next_date }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Next date fixed for</td>
                                                            <td> {{ $data->status_next_date_reason_name }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Remarks</td>
                                                            <td> {{ $data->status_remarks }} </td>
                                                        </tr>
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
                                                            <td>Name of the Court</td>
                                                            <td>{{ rtrim($data->name_of_the_court, ', ') }}</td>
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
                                                            <td>Type of Cases</td>
                                                            <td>{{ $data->case_types_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Case No.</td>
                                                            <td>{{ rtrim($data->case_infos_case_no, ', ') }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Case Year</td>
                                                            <td>{{ rtrim($data->case_infos_case_year, ', ') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Law</td>
                                                            <td>{{ rtrim($data->law, ', ') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Section</td>
                                                            <td>{{ rtrim($data->section, ', ') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Case Filing Date</td>
                                                            <td>{{ $data->date_of_filing }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Matter</td>
                                                            <td> {{ $data->matter_name }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Complainant/Informant Name</td>
                                                            <td>{{ rtrim($data->case_infos_complainant_informant_name, ', ') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Complainant/Informant's Representative</td>
                                                            <td>{{ rtrim($data->case_infos_complainant_informant_name, ', ') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Accused Name</td>
                                                            <td>{{ rtrim($data->case_infos_accused_name, ', ') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Accused's Representative</td>
                                                            <td> {{ rtrim($data->case_infos_accused_representative, ', ') }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Allegation/Claim</td>
                                                            <td> {{ $data->allegation_name }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Amount of Money</td>
                                                            <td> {{ $data->amount_of_money }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Another Claim(if any)</td>
                                                            <td>{{ $data->another_claim }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Summary of Facts</td>
                                                            <td>{{ $data->summary_facts }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Date of Arrest</td>
                                                            <td>{{ $data->date_of_arrest }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Date of Bill</td>
                                                            <td>{{ $data->date_of_bill }}</td>
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
                                                    <h6 class="text-uppercase text-bold"><u> Judgement Information </u></h6>
                                                    <table class="table table-bordered table-responsive">

                                                        <tbody>

                                                        <tr>
                                                            <td>Date of Filing</td>
                                                            <td> {{ $data->judgement_date_of_filing }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Date of Cognizance</td>
                                                            <td>{{ $data->date_of_cognizance }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Date of Court Transfer</td>
                                                            <td>{{ $data->date_of_court_transfer }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Date of Charge Framed</td>
                                                            <td>{{ $data->date_of_charge_framed }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Date of Witness(From)</td>
                                                            <td>{{ $data->date_of_witness_from }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Date of Witness(To)</td>
                                                            <td>{{ $data->date_of_witness_to }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Date of Argument</td>
                                                            <td>{{ $data->date_of_argument }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Date of Judgement & Order</td>
                                                            <td>{{ $data->date_of_judgement_order }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Summary of Judgement & Order</td>
                                                            <td>{{ $data->summary_judgement_order }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Remarks</td>
                                                            <td>{{ $data->judgement_remarks }}</td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="card-header">
                                <h3 class="card-title custom_h3 text-uppercase" id="heading">Documents Logs
                                    @php
                                        $now = Carbon\Carbon::now();
                                        $days_count = Carbon\Carbon::parse($data->created_at)->diffInDays($now);
                                    @endphp

                                    <span class="font-italic custom_font"> (Total Elapsed Time:

                                           {{ $days_count }} Days) </span>
                                </h3>
                            </div>
                            <div class="card-body">
                                <table id="data_table" class="table dataTable no-footer dtr-inline">
                                    <thead>
                                    <tr>
                                        <th class="text-nowrap text-left">Uploaded Document</th>
                                        <th class="text-nowrap text-left">Uploaded By</th>
                                        <th class="text-nowrap text-left">Date & Time</th>
                                        <th class="text-nowrap text-left">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($criminal_cases_files as $files)
                                        <tr>
                                            <td class="text-nowrap">{{ $files->uploaded_document }} </td>
                                            <td class="text-nowrap">{{ $files->created_by }} </td>
                                            <td class="text-nowrap">{{ $files->created_at }} </td>
                                            <td class="text-nowrap">
                                                <form method="get" action="{{ route('delete-criminal-cases-files',$files->id) }}" class="delete-user btn btn-outline-danger btn-xs">
                                                    @csrf
                                                    <button type="submit" class="btn  btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i> </button>
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

                            <div class="card-header">
                                <h3 class="card-title custom_h3 text-uppercase" id="heading">Case Proceedings Logs <span
                                        class="font-italic custom_font">(Case No: {{ $data->case_no }}, Court Name: {{ $data->court_name }})</span>
                                </h3>
                            </div>
                            <div class="card-body">
                                <table id="table_logs_text_center" class="table table-responsive no-footer dtr-inline">
                                    <thead>
                                    <tr>
                                        <th class="table_logs_text_center">Status</th>
                                        <th class="table_logs_text_center">Order Date</th>
                                        <th class="table_logs_text_center">Fixed For</th>
                                        <th class="table_logs_text_center">Court Proceeding </th>
                                        <th class="table_logs_text_center text-nowrap">Court Order </th>
                                        <th class="table_logs_text_center text-nowrap">Day Note</th>
                                        <th class="table_logs_text_center text-nowrap">Engaged Advocates</th>
                                        <th class="table_logs_text_center text-nowrap">Next Day Presence </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($case_logs as $logs)
                                        <tr>
                                            <td class="table_logs_text_center"> {{ $logs->case_status_name }} </td>
                                            <td class="table_logs_text_center"> {{ $logs->updated_order_date }} </td>
                                            <td class="table_logs_text_center"> {{ $logs->updated_fixed_for }} </td>
                                            <td class="table_logs_text_center"> {{ $logs->court_proceeding_name }} {{ $logs->court_proceedings }} </td>
                                            <td class="table_logs_text_center"> {{ $logs->court_last_order_name }} {{ $logs->updated_court_order }}</td>
                                            <td class="table_logs_text_center"> {{ $logs->updated_day_notes }} {{ $logs->updated_day_notes }} </td>
                                            <td class="table_logs_text_center"> {{ $logs->first_name }} {{ $logs->middle_name }} {{ $logs->last_name }} </td>
                                            <td class="table_logs_text_center"> {{ $logs->next_day_presence_name }} </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-header">
                                <h3 class="card-title custom_h3 text-uppercase" id="heading">Billings Logs</h3>
                            </div>
                            <div class="card-body">
                                <table class="data_table table table-responsive no-footer dtr-inline">
                                    <thead>
                                    <tr>
                                        <th class="table_logs_text_center">Bill Type</th>
                                        <th class="table_logs_text_center">Payment Type</th>
                                        <th class="table_logs_text_center">District Name</th>
                                        <th class="table_logs_text_center">Panel Lawyer</th>
                                        <th class="table_logs_text_center">Bill Amount</th>
                                        <th class="table_logs_text_center">Billing Date</th>
                                        <th class="table_logs_text_center">Bank Name</th>
                                        <th class="table_logs_text_center">Bank Branch</th>
                                        <th class="table_logs_text_center">Cheque No.</th>
                                        <th class="table_logs_text_center">Payment Amount</th>
                                        <th class="table_logs_text_center">Digital Payment</th>
                                        <th class="table_logs_text_center">Approval</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bill_history as $bill_logs)
                                        <tr>
                                            <td class="table_logs_text_center"> {{ $bill_logs->bill_type_name }} </td>
                                            <td class="table_logs_text_center"> {{ $bill_logs->payment_type }} </td>
                                            <td class="table_logs_text_center"> {{ $bill_logs->district_name }} </td>
                                            <td class="table_logs_text_center"> {{ $bill_logs->first_name }} </td>
                                            <td class="table_logs_text_center"> {{ $bill_logs->bill_amount }} </td>
                                            <td class="table_logs_text_center"> {{ $bill_logs->date_of_billing }} </td>
                                            <td class="table_logs_text_center"> {{ $bill_logs->bank_name }} </td>
                                            <td class="table_logs_text_center"> {{ $bill_logs->bank_branch_name }} </td>
                                            <td class="table_logs_text_center"> {{ $bill_logs->cheque_no }} </td>
                                            <td class="table_logs_text_center"> {{ $bill_logs->payment_amount }} </td>
                                            <td class="table_logs_text_center"> {{ $bill_logs->digital_payment_type_name }} </td>
                                            <td class="table_logs_text_center"> {{ $bill_logs->is_approved }} </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="card-header">
                                <h3 class="card-title custom_h3 text-uppercase" id="heading">Case Activities Logs</h3>
                            </div>

                            <div class="card-body">
                                <table class="table table-responsive no-footer dtr-inline data_table">
                                    <thead>
                                    <tr>
                                        <th class="text-left text-nowrap">Date</th>
                                        <th class="text-left text-nowrap">Activity/Action</th>
                                        <th class="text-left text-nowrap">Progress</th>
                                        <th class="text-left text-nowrap">Mode</th>
                                        <th class="text-left text-nowrap">Time Spent</th>
                                        <th class="text-left text-nowrap padding_right_th">Engaged</th>
                                        <th class="text-left text-nowrap">Forwarded To</th>
                                        <th class="text-left text-nowrap">Update</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($case_activity_log as $activity_log)
                                        <tr>
                                            <td > {{ $activity_log->activity_date }} </td>
                                            <td > {{ $activity_log->activity_action }} </td>
                                            <td > {{ $activity_log->activity_progress }} </td>
                                            <td > {{ $activity_log->activity_mode }} </td>
                                            <td > {{ $activity_log->activity_time_spent }} </td>
                                            <td > {{ $activity_log->activity_engaged }} </td>
                                            <td > {{ $activity_log->first_name }} {{ $activity_log->middle_name }} {{ $activity_log->last_name }} </td>
                                            <td > {{ $activity_log->created_at }} </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->

@endsection




