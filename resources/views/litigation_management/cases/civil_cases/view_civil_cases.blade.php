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
                        <h1 class="m-0 text-dark"> Civil Cases </h1>

                    </div><!-- /.col -->


                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a class="leading-normal inline-flex items-center font-normal spark-button-focus h-8 text-md px-4 bg-transparent border-0 border-solid text-blue-700 hover:text-blue-800 active:text-blue-700 rounded-md"
                                   type="button" href="{{ route('civil-cases') }}" aria-disabled="false" role="link"
                                   tabindex="-1">Back</a>
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
                        <div class="">
                            <div class="card-header">
                                <h3 class="card-title custom_h3" id="heading">Civil Cases Details</h3>
                                <div class="float-right">

                                    <a href="{{ route('edit-civil-cases', $data->id) }}">
                                        <button
                                            class="btn btn-info btn-sm" data-toggle="tooltip"
                                            data-placement="top" title="Edit"><i
                                                class="fas fa-edit"></i></button>
                                    </a>

                                </div>
                            </div>

                            <div class="card">

                                <div class="card-header">
                                    <div class="text-center mr-md-5">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="appeal_case"
                                                   name="case" value="Appeal Case">
                                            <label class="custom-control-label" for="appeal_case">Appeal Case</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="revision_case"
                                                   name="case" value="Revision Case">
                                            <label class="custom-control-label" for="revision_case">Revision
                                                Case</label>
                                        </div>
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

                                                        <table class="table table-bordered">

                                                            <tbody>

                                                            <tr>
                                                                <td>Client Name</td>
                                                                <td> {{ $data->client }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Case No.</td>
                                                                <td>{{ $data->client_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Name of the Court</td>
                                                                <td>{{ $data->court_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Next Date</td>
                                                                <td>{{ $data->next_date }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Next date fixed for</td>
                                                                <td>{{ $data->next_date_reason_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>In favour of</td>
                                                                <td>{{ $data->ic_first_name }} {{ $data->ic_middle_name }} {{ $data->ic_last_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Received Date</td>
                                                                <td>{{ $data->received_date }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Received From</td>
                                                                <td>{{ $data->received_from }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Received By</td>
                                                                <td>{{ $data->received_by }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Receiver Contact Details</td>
                                                                <td>{{ $data->receiver_contact_details }}</td>
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
                                                        <table class="table table-bordered">

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
                                                                <td>Division</td>
                                                                <td>{{ $data->client_division_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>District</td>
                                                                <td>{{ $data->client_district_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Thana</td>
                                                                <td>{{ $data->client_thana_name }}</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h6 class="text-uppercase text-bold"><u> Documents
                                                                Information </u></h6>
                                                        <table class="table table-bordered">

                                                            <tbody>

                                                            <tr>
                                                                <td>Received Documents</td>
                                                                <td> {{ $data->received_documents }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Required/Missing Documents</td>
                                                                <td>{{ $data->required_missing_documents }}</td>
                                                            </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h6 class="text-uppercase text-bold"><u> Update Case Status </u>
                                                        </h6>
                                                        <table class="table table-bordered">

                                                            <tbody>

                                                            <tr>
                                                                <td>Status</td>
                                                                <td> {{ $data->update_case_status_name }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Next Date</td>
                                                                <td>{{ $data->update_next_date }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Next date fixed for</td>
                                                                <td>{{ $data->update_next_date_reason_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Case Proceedings</td>
                                                                <td>{{ $data->case_proceedings }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Case Notes</td>
                                                                <td>{{ $data->update_case_notes }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Next Day Presence</td>
                                                                <td>{{ $data->next_day_presence_name }}</td>
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
                                                                <td>Case Category</td>
                                                                <td> {{ $data->case_category }} </td>
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
                                                                <td>{{ $data->case_infos_case_no }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Name of the filling Court</td>
                                                                <td>{{ $data->name_of_the_court }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Date of filing</td>
                                                                <td>{{ $data->date_of_filing }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Law</td>
                                                                <td>{{ $data->law }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Section</td>
                                                                <td>{{ $data->section }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Division</td>
                                                                <td>{{ $data->client_division_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>District</td>
                                                                <td>{{ $data->client_district_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Thana</td>
                                                                <td>{{ $data->client_thana_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Allegation/Claim</td>
                                                                <td>{{ $data->allegation_claim }}</td>
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
                                                                <td>Summary of Facts</td>
                                                                <td>{{ $data->summary_facts }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Name of the Complainant</td>
                                                                <td>{{ $data->complainant_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Name of the Representative</td>
                                                                <td>{{ $data->representative_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Details of the Representative</td>
                                                                <td>{{ $data->representative_details }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Name of the Accused</td>
                                                                <td>{{ $data->accused_name }}</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h6 class="text-uppercase text-bold"><u> Lawyers
                                                                Information </u></h6>
                                                        <table class="table table-bordered">

                                                            <tbody>

                                                            <tr>
                                                                <td>Name of Advocate/Law Firm</td>
                                                                <td> {{ $data->advocate_name }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Name of Assigned Lawyer</td>
                                                                <td>{{ $data->assigned_lawyer }}</td>
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
                                                                <td>Status</td>
                                                                <td> {{ $data->case_status_name }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Next Date</td>
                                                                <td>{{ $data->status_next_date }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Next date fixed for</td>
                                                                <td>{{ $data->status_next_date_reason_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Comments</td>
                                                                <td>{{ $data->comments }}</td>
                                                            </tr>

                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6 class="text-uppercase text-bold"><u> Case Information </u>
                                                    </h6>

                                                    <table class="table table-bordered">

                                                        <tbody>

                                                        <tr>
                                                            <td>Original Case No.</td>
                                                            <td> {{ $data->case_status_name }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Subsequent Case No.</td>
                                                            <td>{{ $data->status_next_date }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Date of Judgement & Order</td>
                                                            <td>{{ $data->status_next_date_reason_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Summary of Judgement & Order</td>
                                                            <td>{{ $data->comments }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Appeal Case Category</td>
                                                            <td>{{ $data->comments }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Appeal Case Subcategory</td>
                                                            <td>{{ $data->comments }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Appeal Case Type</td>
                                                            <td>{{ $data->comments }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Appeal Case No.</td>
                                                            <td>{{ $data->comments }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Name of the filing Court</td>
                                                            <td>{{ $data->comments }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Date of filing</td>
                                                            <td>{{ $data->comments }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Law</td>
                                                            <td>{{ $data->comments }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Section</td>
                                                            <td>{{ $data->comments }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Allegation/Claim</td>
                                                            <td>{{ $data->comments }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Amount of Money</td>
                                                            <td>{{ $data->comments }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Another Claim (if any)</td>
                                                            <td>{{ $data->comments }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Summary of Facts</td>
                                                            <td>{{ $data->comments }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Name of the Appellant</td>
                                                            <td>{{ $data->comments }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Name of the Representative</td>
                                                            <td>{{ $data->comments }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Details of the Representative</td>
                                                            <td>{{ $data->comments }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Name of the Respondent/Opposite Party</td>
                                                            <td>{{ $data->comments }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Name of the Representative</td>
                                                            <td>{{ $data->comments }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Details of the Representative</td>
                                                            <td>{{ $data->comments }}</td>
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
                                <h3 class="card-title custom_h3" id="heading">Documents Log

                                    @php
                                        $now = Carbon\Carbon::now();
                                        $days_count = Carbon\Carbon::parse($data->created_at)->diffInDays($now);
                                    @endphp

                                    <span class="display-5"><b> (Total Elapsed Time:

                                           {{ $days_count }} Days) </b></span>

                                </h3>
                            </div>
                            <div class="card-body">
                                <table id="data_table" class="table dataTable no-footer dtr-inline">
                                    <thead>
                                    <tr>
                                        <th class="table_text_center">Uploaded Document</th>
                                        <th class="table_text_center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($civil_cases_files as $files)
                                        <tr>
                                            <td class="table_text_center">
                                                {{ $files->uploaded_document }}
                                            </td>
                                            <td class="table_text_center">

                                                <a href="{{ route('download-civil-cases-files', $files->id) }}">
                                                    <button
                                                        class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                                                        data-placement="top" title="Download"><i
                                                            class="fas fa-download"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>


                            <div class="card-header">
                                <h3 class="card-title custom_h3" id="heading">Case Proceedings Log <span><b>(Case No: {{ $data->case_no }}, Court Name: {{ $data->court_name }})</b></span>
                                </h3>
                            </div>
                            <div class="card-body">
                                <table id="table_logs_text_center" class="table table-responsive no-footer dtr-inline">
                                    <thead>
                                    <tr>
                                        <th class="table_logs_text_center">Order Date</th>
                                        <th class="table_logs_text_center">Next Date</th>
                                        <th class="table_logs_text_center">Next Date Reason</th>
                                        <th class="table_logs_text_center">Accused Name</th>
                                        <th class="table_logs_text_center">Case Proceedings</th>
                                        <th class="table_logs_text_center">Update Description</th>
                                        <th class="table_logs_text_center">Case Notes</th>
                                        <th class="table_logs_text_center">Panel Lawyer</th>
                                        <th class="table_logs_text_center">Final Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($case_logs as $logs)
                                        <tr>
                                            <td class="table_logs_text_center"> {{ $logs->order_date }} </td>
                                            <td class="table_logs_text_center"> {{ $logs->updated_next_date }} </td>
                                            <td class="table_logs_text_center"> {{ $logs->next_date_fixed_reason }} </td>
                                            <td class="table_logs_text_center"> {{ $logs->updated_accused_name }} </td>
                                            <td class="table_logs_text_center"> {{ $logs->case_proceedings }} </td>
                                            <td class="table_logs_text_center"> {{ $logs->update_description }} </td>
                                            <td class="table_logs_text_center"> {{ $logs->case_notes }} </td>
                                            <td class="table_logs_text_center"> {{ $logs->first_name }} {{ $logs->middle_name }} {{ $logs->last_name }} </td>
                                            <td class="table_logs_text_center"> {{ $logs->case_status_name }} </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-header">
                                <h3 class="card-title custom_h3" id="heading">Billings Log</h3>
                            </div>
                            <div class="card-body">
                                <table id="table_bill_logs_text_center"
                                       class="table table-responsive no-footer dtr-inline">
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
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
</div>
@endsection




